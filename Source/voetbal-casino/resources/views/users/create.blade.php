@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Wijzig Gebruiker</h2>

    <div class="mb-2">
        <a href="{{ route('user.index') }}">Terug naar de lijst</a>
    </div>

<!-- TODO: add error/message -->
    

    <form class="row" action="{{ route('user.store') }}" method="POST">
    @csrf
        <div class="col-12">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="voornaam">voornaam</label>
                <input type="text" class="form-control" id="voornaam" name="voornaam" placeholder="voornaam">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="achternaam">achternaam</label>
                <input type="text" class="form-control" id="achternaam" name="achternaam" placeholder="achternaam">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="woonplaats">woonplaats</label>
                <input type="text" class="form-control" id="woonplaats" name="woonplaats" placeholder="woonplaats">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="postcode">postcode</label>
                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="postcode">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="geboortedatum">geboortedatum</label>
                <input type="date" class="form-control" id="geboortedatum" name="geboortedatum" placeholder="geboortedatum">
            </div>
        </div>

        <div class="col-12 mt-2">
            <button class="btn btn-primary" type="submit">Bewaren</button>
        </div>
    </form>
</div>
@endsection
