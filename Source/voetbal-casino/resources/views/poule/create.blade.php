@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">Maak nieuwe Poule</h2>
            
            <form method="POST" action="{{ route('poule.store') }}">
                @csrf

                <!-- Title Input -->
                <div class="form-group mb-4">
                    <label for="title">Titel:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <!-- Add Users Checkboxes -->
                <div class="form-group mb-4">
                    <label>Selecteer gebruikers om ze toetevoegen aan de Poule:</label>
                    <br>

                    <div class="row">
                        @php
                            $checkboxCount = 0;
                        @endphp

                        @foreach($users as $user)
                            @if($user->role !== 'admin')
                                <div class="col-md-3"> <!-- Adjust the column size as needed -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="user_ids[]" id="user{{ $user->id }}" value="{{ $user->id }}">
                                        <label class="form-check-label" for="user{{ $user->id }}">{{ $user->name }}</label>
                                    </div>
                                </div>

                                @php
                                    $checkboxCount++;
                                    // Start a new row every 8 checkboxes
                                    if ($checkboxCount % 8 === 0) {
                                        echo '</div><div class="row">';
                                    }
                                @endphp
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create Poule</button>
            </form>
        </div>
    </div>
</div>

@endsection
