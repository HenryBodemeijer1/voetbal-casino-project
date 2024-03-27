@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="padding: 10px 0px;"></div>
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">Profiel Bewerken</h2>
            <hr> <!-- Divider -->

            <!-- Form for editing profile -->
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')

                <!-- Username -->
                <div class="form-group">
                    <label for="name">Gebruikersnaam:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <!-- Voornaam -->
                <div class="form-group">
                    <label for="voornaam">Voornaam:</label>
                    <input type="text" class="form-control" id="voornaam" name="voornaam" value="{{ $user->voornaam }}" required>
                </div>

                <!-- Achternaam -->
                <div class="form-group">
                    <label for="achternaam">Achternaam:</label>
                    <input type="text" class="form-control" id="achternaam" name="achternaam" value="{{ $user->achternaam }}" required>
                </div>

                <!-- Woonplaats -->
                <div class="form-group">
                    <label for="woonplaats">Woonplaats:</label>
                    <input type="text" class="form-control" id="woonplaats" name="woonplaats" value="{{ $user->woonplaats }}">
                </div>

                <!-- Postcode -->
                <div class="form-group">
                    <label for="postcode">Postcode:</label>
                    <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $user->postcode }}">
                </div>

                <!-- Geboortedatum -->
                <div class="form-group">
                    <label for="geboortedatum">Geboortedatum:</label>
                    <input type="date" class="form-control" id="geboortedatum" name="geboortedatum" value="{{ $user->geboortedatum }}">
                </div>

                <!-- Submit Button -->
                <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Opslaan</button>
            </form>
        </div>
    </div>
</div>

@endsection

