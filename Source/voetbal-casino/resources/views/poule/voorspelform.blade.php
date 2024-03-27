@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">Voorspel wedstrijd</h2>
            
            <form method="POST" action="{{ route('prediction.submit', ['pouleId' => $poule->id]) }}">
                @csrf        
                
                <!-- Hidden Poule ID -->
                <input type="hidden" id="poule_id" name="poule_id" value="{{ $poule->id }}">

                <!-- Retrieve team keys from the route parameters -->
                <input type="hidden" id="event_key" name="event_key" value="{{ request()->event_key }}">
                <input type="hidden" id="home_team_key" name="home_team_key" value="{{ request()->team1 }}">
                <input type="hidden" id="away_team_key" name="away_team_key" value="{{ request()->team2 }}">
                <input type="hidden" id="event_home_team" name="event_home_team" value="{{ request()->event_home_team }}">
                <input type="hidden" id="event_away_team" name="event_away_team" value="{{ request()->event_away_team }}">
                <input type="hidden" id="event_final_result" name="event_final_result" value="{{ request()->event_final_result }}">

                <!-- Winning team Input -->
                <div class="form-group mb-4">
                    <label for="winning-team">Overwinnend team:</label>
                    <select class="form-control" id="winning-team" name="winning-team" required>
                        <option value="{{ request()->event_home_team }}">{{ request()->event_home_team }}</option>
                        <option value="{{ request()->event_away_team }}">{{ request()->event_away_team }}</option>
                        <option value="gelijkspel">Gelijkspel</option>
                    </select>
                </div>

                <!-- Eindstand Input -->
                <div class="form-group mb-4">
                    <label for="eindstand">Eindstand</label>
                    <select class="form-control" id="eindstand" name="eindstand" required>
                        @for ($i = 0; $i <= 10; $i++)
                            @for ($j = 0; $j <= 10; $j++)
                                @if ($i > $j)
                                    <option value="{{ $i }} - {{ $j }}" class="home-option">{{ $i }} - {{ $j }}</option>
                                @elseif ($i == $j)
                                    <option value="{{ $i }} - {{ $j }}" class="gelijkspel-option">{{ $i }} - {{ $j }}</option>
                                @else
                                    <option value="{{ $i }} - {{ $j }}" class="away-option">{{ $i }} - {{ $j }}</option>
                                @endif
                            @endfor
                        @endfor
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Voorspel wedstrijd</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Initial page load
        filterOptions();

        // Event handler for changing the winning team dropdown
        $('#winning-team').change(function () {
            filterOptions();
        });

        function filterOptions() {
            // Reset all options to be visible
            $('#eindstand option').show();

            // Get the selected value in the winning team dropdown
            var selectedTeam = $('#winning-team').val();

            // Hide options based on the selected team
            if (selectedTeam === "{{ request()->event_home_team }}") {
                $('#eindstand option:not(.home-option)').hide();
            } else if (selectedTeam === "{{ request()->event_away_team }}") {
                $('#eindstand option:not(.away-option)').hide();
            } else if (selectedTeam === "gelijkspel") {
                $('#eindstand option:not(.gelijkspel-option)').hide();
            }
        }
    });
</script>

@endsection