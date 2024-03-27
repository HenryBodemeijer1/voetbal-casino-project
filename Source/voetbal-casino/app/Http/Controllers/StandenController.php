<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Standen;
use App\Models\Team;

class StandenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiKey = config('services.allsportsapi.key');
        $apiUrl = 'https://apiv2.allsportsapi.com/football?met=Standings&leagueId=177&APIkey=' . $apiKey;
        
        $response = Http::get($apiUrl);
        $data = json_decode($response->getBody(), true);
            // Dump the entire API response
            
        if (isset($data['result'])) {
            $standings = $data['result'];
                 
            return view('standen.index', compact('standings'));
        } else {
            // Handle the case where 'result' key is not found
            $standings = [];
            return view('errors.error');
        }
    }

    public function show(Request $request)
    {
        $teamKey = $request->query('team_key');

        $apiKey = config('services.allsportsapi.key');
        $apiUrl = 'https://apiv2.allsportsapi.com/football/?met=Teams&teamId=' . $teamKey . '&APIkey=' . $apiKey;
        
        $response = Http::get($apiUrl);
        $team_data = json_decode($response->getBody(), true);
            // Dump the entire API response
            
        if (isset($team_data['result'])) {
            $teams = $team_data['result'];
                 
            return view('teams.index', compact('teams'));
        } else {
            // Handle the case where 'result' key is not found
            $teams = [];
            return view('errors.error');
        }
    }
}