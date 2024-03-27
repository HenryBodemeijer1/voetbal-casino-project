@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="padding: 10px 0px;"></div>
    <div class="card shadow">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="card-title">Poule's</h2>

                <!-- Create Poule Button -->
                <a class="btn btn-success" href="{{ route('poule.create') }}">Maak nieuwe Poule</a>
            </div>

            <div class="row" id="poules-container">
                @foreach($poules as $index => $poule)
                    <div class="col-md-6 mb-4 poule-box @if($index >= 8) hidden @endif">
                        <div class="card" onclick="window.location='{{ route('poule.show', $poule->id) }}';" style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f2f2f2';" onmouseout="this.style.backgroundColor='white';">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">{{ $poule->title }}</h5>
                                    <p class="card-text">
                                        <strong>geselecteerde Gebruikers:</strong>
                                        @foreach($poule->users as $user)
                                            {{ $user->name }}@if(!$loop->last), @endif
                                        @endforeach
                                    </p>
                                </div>
                                <form action="{{ route('poule.joinorleave', $poule->id) }}" method="post">
                                    @csrf
                                    @if(auth()->user()->poules->contains($poule))
                                        <button type="submit" class="btn btn-danger">Verlaat Poule</button>
                                    @else
                                        <button type="submit" class="btn btn-dark">Sluit aan bij Poule</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Show More Button (Centered) -->
            <div class="text-center">
                <button class="btn btn-primary" id="show-more-btn">Show More Poule's</button>
            </div>
        </div>
    </div>
</div>

@endsection