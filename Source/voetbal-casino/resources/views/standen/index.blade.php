@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Standen</h2>

    <div class="responsive-table">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Team</th>
                    <th>Wedstrijden gespeeld</th>
                    <th>Wedstrijden gewonnen</th>
                    <th>Doelsaldo</th>
                    <th>Punten</th>
                </tr>
            </thead>
            
            <tbody>
                @php $count = 0; @endphp
                    @foreach ($standings as $stand)
                        @foreach($stand as $standing)
                            @if ($count < 18)
                                <tr onclick="window.location='{{ route('teams.index', ['team_key' => $standing['team_key']]) }}';" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f2f2f2';" onmouseout="this.style.backgroundColor='white';">
                                    
                                    <td class="align-middle">{{ $standing['standing_place'] }}</td>
                                    <td class="align-middle">
                                        <img src="{{ $standing['team_logo'] }}" alt="{{ $standing['standing_team'] }} logo" class="img-fluid" width="30">
                                        {{ $standing['standing_team'] }}
                                    </td>
                                    <td class="align-middle">{{ $standing['standing_P'] }}</td>
                                    <td class="align-middle">{{ $standing['standing_W'] }}</td>
                                    <td class="align-middle">{{ $standing['standing_GD'] }}</td>
                                    <td class="align-middle">{{ $standing['standing_PTS'] }}</td>
                                </tr>
                                @php $count++; @endphp
                            @else
                                @break
                            @endif
                        @endforeach                  
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- TODO: add pagination -->
@endsection