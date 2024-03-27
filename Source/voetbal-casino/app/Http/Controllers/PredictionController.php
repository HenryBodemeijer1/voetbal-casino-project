<?php

namespace App\Http\Controllers;

use App\is_valid_url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Prediction;
use App\Models\Poule;

class PredictionController extends Controller
{
    

    public function upcomingGames($id)
    {
        $apiKey = config('services.allsportsapi.key');
        $apiUrl = 'https://apiv2.allsportsapi.com/football/?met=Fixtures&APIkey=' . $apiKey . '&from=2023-11-05&to=2023-11-20';

        $response = Http::get($apiUrl);
        // $fixtures = $response->json();

        $data = json_decode($response->getBody(), true);

        $poule = Poule::find($id);

        // Check if 'result' key exists in the response
        if (isset($data['result'])) {
            $upcomingGames = $data['result'];
             
            return view('poule.voorspel', compact('upcomingGames', 'poule'));
        } else {
            // Handle the case where 'result' key is not found
            $upcomingGames = [];
            return view('errors.error');
        }
        
    }

    public function voorspelform($id)
    {
        $apiKey = config('services.allsportsapi.key');
        $apiUrl = 'https://apiv2.allsportsapi.com/football/?met=Fixtures&APIkey=' . $apiKey . '&from=2023-11-05&to=2023-11-20';

        $response = Http::get($apiUrl);
        $data = json_decode($response->getBody(), true);
        $poule = Poule::find($id);

        // Check if 'result' key exists in the response
        if (isset($data['result'])) {
            $teams = $data['result'];
             
            return view('poule.voorspelform', compact('poule', 'teams'));
        } else {
            // Handle the case where 'result' key is not found
            $teams = [];
            return view('errors.error');
        }
        
    }

    public function submit(Request $request, $pouleId)
    {

        $predictions = Prediction::where('user_id', Auth()->id())
        ->where('poule_id', $pouleId)
        ->get()
        ->toArray();

        foreach ($predictions as $prediction)
        {
            if ($prediction['event_key'] == $request->input('event_key'))
            {
                return view('errors.dubbleprediction-error');
            }
        }

        // Store the prediction in the database
        $prediction = Prediction::create([
            'user_id' => auth()->user()->id,
            'poule_id' => $pouleId,
            'event_key' => $request->input('event_key'),
            'home_team_key' => $request->input('home_team_key'),
            'away_team_key' => $request->input('away_team_key'),
            'event_home_team' => $request->input('event_home_team'),
            'event_away_team' => $request->input('event_away_team'),
            'event_final_result' => $request->input('event_final_result'),
            'winner' => null,
            'winning_team' => $request->input('winning-team'),
            'eindstand' => $request->input('eindstand'),
            'game_id' => $request->input('game_id'),
        ]);

        // Redirect to the poule.show route with the poule ID
        return redirect()->route('poule.show', ['poule' => $pouleId]);
    }


    public function result($predictionId)
    {
        $predictions = Prediction::where('poule_id', $predictionId)->get();

        if (!$predictions) {
            // Handle the case where the prediction with the given ID is not found
            return view('errors.error');
        }

        $apiKey = config('services.allsportsapi.key');
        $apiUrl = 'https://apiv2.allsportsapi.com/football/?met=Fixtures&APIkey=' . $apiKey . '&from=2023-11-05&to=2023-11-20';

        $response = Http::get($apiUrl); 
        $fixtures = $response->json();

        if (isset($fixtures['result'][0])) {
            $actualGame = $fixtures['result'][0];

            foreach ($predictions as $prediction)
            {
                // Retrieve user predictions from the database
            $predictedEindstand = $prediction->eindstand;

            // Extract actual result data
            $actualEindstand = $prediction->event_final_result;

            // Extract numbers from eindstand
            $predictedNumbers = explode(' - ', $predictedEindstand);
            $actualNumbers = explode(' - ', $actualEindstand);

            if ($actualNumbers[0] == $actualNumbers[1]) {
                $actualWinner = 'gelijkspel'; 
            } elseif ($actualNumbers[0] > $actualNumbers[1]) {
                $actualWinner = $prediction->event_home_team;
            } elseif ($actualNumbers[0] < $actualNumbers[1]) {
                $actualWinner = $prediction->event_away_team;
            }

            // Award points based on correctness
            $points = 0;

            if ($prediction->winning_team == $actualWinner) {
                $points += 1;
            }

            if ($predictedEindstand == $actualEindstand) {
                $points += 2;
            }

            $prediction->points = $points;
            $prediction->actualWinner = $actualWinner;

            $prediction->save();
            }
            
            $poule = Poule::find($predictionId);

        return view('poule.result', compact('predictions', 'actualGame', 'points', 'poule', 'actualWinner'));
        }

    return view('errors.error');
    }
}