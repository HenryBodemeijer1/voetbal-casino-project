@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gebruikers</h2>

    <div class="row">
        <div class="col col-md-6">
            
                <a class="btn btn-success" style="margin-bottom: 5px;" href="{{ route('user.create') }}">Nieuwe gebruiker</a>
            
        </div>
        <!-- <div class="col-6 col-md-6">
          <form action="{{ route('user.index') }}" method="GET">
              <div class="input-group input-group-sm mb-3 zoekbalk">
                  <input type="text" class="form-control zoekbalksize" name="filter" placeholder="Filter" aria-label="Filter">
                  <button class="btn btn-outline-secondary zoekbalkbutton" type="submit" id="filter">Zoek</button>
              </div>
          </form>
        </div> -->
    </div>

    <div class="responsive-table">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
    width="100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>voornaam</th>
                    <th>achternaam</th>
                    <th>woonplaats</th>
                    <th>postcode</th>
                    <th>geboortedatum</th>
                
                    <th>Acties</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                <!-- <tr onclick="window.location='{{ route('user.show', $user->id) }}'" >  -->
                    <td class="align-middle">{{ $user->id }}</td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->voornaam }}</td>
                    <td class="align-middle">{{ $user->achternaam }}</td>
                    <td class="align-middle">{{ $user->woonplaats }}</td>
                    <td class="align-middle">{{ $user->postcode }}</td>
                    <td class="align-middle">{{ $user->geboortedatum }}</td>
                    
                        <td class="align-middle">
                            <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Wijzig</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Weet je zeker dat je deze gegevens wilt verwijderen?')" class="btn btn-danger">Verwijder</button>
                            </form>
                        </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- TODO: add pagination -->
@endsection