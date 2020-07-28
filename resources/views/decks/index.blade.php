@extends('cardflash::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Decks</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($decks as $deck)
                    <div class="card" style="height: 160px;">
                        <div class="card-body d-flex flex-column">
                            <div><h3>{{ $deck->name }}</h3></div>
                            <div>
                                <a href="{{ route('cardflash.decks.start', $deck->id) }}">Start</a>
                                <a href="{{ route('cardflash.decks.show', $deck->id) }}">View Cards</a>
                            </div>
                            <div class="mt-auto"><b>{{ count($deck->cards) }} cards</b></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('cardflash.decks.create') }}" class="btn btn-info">Create Deck</a>
            </div>
        </div>
    </div>
</div>
@endsection