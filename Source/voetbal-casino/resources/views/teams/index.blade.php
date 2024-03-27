@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-body">
            @foreach ($teams as $team)
                <h2 class="card-title">
                    @if (!empty($team['team_logo']))
                        <img src="{{ $team['team_logo'] }}" alt="{{ $team['team_name'] }} logo" class="img-fluid" width="50">
                    @endif
                    {{ $team['team_name'] }}
                </h2>
                @if (empty($team['players']))
                    <h4>Sorry, er is geen data over dit team beschikbaar.</h4>
                @else
                    <div class="row">
                        @foreach ($team['players'] as $player)
                            <div class="col-md-2 p-3">
                                <div class="card">
                                    <img src="{{ !empty($player['player_image']) ? $player['player_image'] : asset('img/person-img.png') }}" class="card-img-top img-fluid" alt="Card Image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $player['player_name'] }}</h5>
                                        <p>Nummer: {{ !empty($player['player_number']) ? $player['player_number'] : 'onbekend' }}</p>
                                        <p>Type: {{ !empty($player['player_type']) ? $player['player_type'] : 'onbekend' }}</p>
                                        <p>Leeftijd: {{ !empty($player['player_age']) ? $player['player_age'] : 'onbekend' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection