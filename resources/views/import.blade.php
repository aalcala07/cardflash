@extends('cardflash::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Import Cards</h3>
            @if (session('success_message'))
            <div class="alert alert-success">{{ session('success_message') }}</div>
            @endif
            @if (session('error_message'))
            <div class="alert alert-danger">{{ session('error_message') }}</div>
            @endif
            <form method="POST" action="{{ route('cardflash.import.upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="cards_csv">Upload a CSV:</label>
                    <input name="cards_csv" type="file" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Card Deck</label>
                    <select name="deck_id" class="form-control">
                        @foreach (Cardflash\Deck::all() as $deck)
                        <option value="{{ $deck->id }}">{{ $deck->id }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>
@endsection