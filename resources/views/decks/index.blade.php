@extends('cardflash::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('success_message'))
            <div class="alert alert-success">{{ session('success_message') }}</div>
            @endif
            @if (session('error_message'))
            <div class="alert alert-danger">{{ session('error_message') }}</div>
            @endif


            <div class="card">
                <div class="card-header">Decks</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($decks as $deck)
                    <div class="card mb-3" style="height: 160px;">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex">
                                <div><h3>{{ $deck->name }}</h3></div>
                                <div class="ml-auto">
                                    <a href="{{ route('cardflash.decks.show', $deck->id) }}" class="mr-3">View Cards</a>
                                    <a href="{{ route('cardflash.decks.edit', $deck->id) }}" class="mr-3">Edit</a>
                                    <a href="{{ route('cardflash.decks.deleteCheck', $deck->id) }}">Delete</a>
                                </div>
                            </div>
                            <div class="d-flex mt-auto">
                                <div><b>{{ count($deck->cards) }} cards</b></div>
                                <div class="ml-auto">
                                    <a href="{{ route('cardflash.decks.start', $deck->id) }}" class="btn btn-success btn-sm">Start</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <a href="{{ route('cardflash.decks.create') }}" class="btn btn-primary">Create Deck</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection