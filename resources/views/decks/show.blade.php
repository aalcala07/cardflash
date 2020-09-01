@extends('cardflash::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-8">

            @if (session('success_message'))
            <div class="alert alert-success">{{ session('success_message') }}</div>
            @endif
            @if (session('error_message'))
            <div class="alert alert-danger">{{ session('error_message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">{{ $deck->name }}</div>

                <div class="card-body">

                    @if (!$deck->cards->count())
                        There are no cards in this deck.
                    @else

                        @foreach ($deck->cards as $card)
                        <div class="d-flex">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="card mr-3 mb-5" style="height: 160px; width: 260px;">
                                    <div class="card-body">
                                        {{ $card->primary_text }}<br>
                                        <b>{{ $card->secondary_text }}</b>
                                    </div>
                                </div>
                                <div class="card mr-3" style="height: 160px; width: 260px;">
                                    <div class="card-body">
                                        {{ $card->answer }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('cardflash.cards.edit', $card->id) }}" class="d-block">Edit</a>
                                <a href="{{ route('cardflash.cards.deleteCheck', $card->id) }}" class="d-block">Delete</a>
                            </div>
                        </div>
                        @endforeach

                    @endif
                    <a href="{{ route('cardflash.cards.create', $deck->id) }}" class="btn btn-primary">Create Card</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection