@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $poule->title }} ranglijst</h2>

    <div class="d-flex justify-content-between">
        <div>
            <a class="btn btn-success" style="margin-bottom: 5px;" href="{{ url('poule') }}">Terug</a>
        </div>
        <div>
            @if(auth()->user()->poules->contains($poule))
                <a class="btn btn-success" style="margin-bottom: 5px;" href="{{ route('poule.voorspel', ['poule' => $poule->id]) }}">Voorspel volgende wedstrijd</a>
                <a class="btn btn-info" style="margin-bottom: 5px;" href="{{ route('poule.result', ['poule' => $poule->id]) }}">Uitslagen</a>
            @endif
        </div>
        
    </div>

    <div class="responsive-table">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Naam</th>
                    <th>Punten</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $rank = 1;
                @endphp
                @foreach($poule->users->sortByDesc('totalPoints') as $user)
                    <tr>
                        <td class="align-middle">{{ $rank++ }}</td>
                        <td class="align-middle">
                            @if($user->name)
                                {{ $user->name }}
                            @else
                                No Name
                            @endif
                        </td>
                        <td class="align-middle">{{ $user->totalPoints }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- TODO: add pagination -->
@endsection