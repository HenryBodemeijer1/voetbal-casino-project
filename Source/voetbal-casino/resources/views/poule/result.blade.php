@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-6">                
            <a class="btn btn-success" style="margin-bottom: 5px;" href="{{ route('poule.show', $poule->id) }}">Terug naar ranglijst</a>                
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">Uitslagen voorspelingen</h2>

            <div class="responsive-table">
                <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>Wedstrijd</th>
                            <th>Overwinnend team</th>
                            <th>Eindstand</th>
                            <th>Voorspelde overwinnend team</th>
                            <th>Voorspelde eindstand</th>
                            <th>Gekregen punten</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        @foreach($predictions as $prediction)                      
                            @if($prediction->user_id == auth()->id())
                                <tr>                                
                                    <td class="align-middle">{{ $prediction['event_home_team' ]}} vs {{ $prediction['event_away_team'] }}</td>
                                    <td class="align-middle">{{ $prediction->actualWinner }}</td>
                                    <td class="align-middle">{{ $prediction->event_final_result }}</td>                               
                                    <td class="align-middle">{{ $prediction->winning_team }}</td>
                                    <td class="align-middle">{{ $prediction->eindstand }}</td>
                                    <td class="align-middle">{{ $prediction->points }}</td>
                                </tr>
                            @endif
                        @endforeach                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection