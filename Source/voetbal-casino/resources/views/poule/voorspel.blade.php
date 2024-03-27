@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">Voorspel wedstrijden</h2>
                <div class="row">
                    @foreach ($upcomingGames as $game)
                    <div class="col-md-6 p-3">
                        <div class="border" onclick="window.location='{{ route('poule.voorspelform', ['poule' => $poule->id, 'event_key' => $game['event_key'], 'event_final_result' => $game['event_final_result'], 'team1' => $game['home_team_key'], 'event_home_team' => $game['event_home_team'], 'team2' => $game['away_team_key'], 'event_away_team' => $game['event_away_team']]) }}';" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f2f2f2';" onmouseout="this.style.backgroundColor='white';">    
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="col-md-8 divider">
                                    <img src="{{ $game['home_team_logo'] ?? asset('img/team_logo_alt.jpg') }}" alt="{{ $game['event_home_team'] }} logo" class="img-fluid" width="30">
                                    <span>{{ $game['event_home_team'] }}</span>
                                    <br>
                                    <img src="{{ $game['away_team_logo'] ?? asset('img/team_logo_alt.jpg') }}" alt="{{ $game['event_away_team'] }} logo" class="img-fluid" width="30">
                                    <span>{{ $game['event_away_team'] }}</span>
                                </div>
                                <div class="col-md-4" style="padding-left: 10px;">
                                    <p style="margin: 0;">Date: {{ $game['event_date'] }}</p>
                                    <p style="margin: 0;">Time: {{ $game['event_time'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>

@endsection