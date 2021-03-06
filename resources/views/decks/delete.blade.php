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
                <div class="card-header">Delete Deck</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cardflash.decks.destroy', $deck->id) }}">
                        @method('DELETE')
                        @csrf

                        <p>Are you sure you want to delete <b>{{ $deck->name }}</b>?</p>

                        <button type="submit" class="btn btn-success">Delete Deck</button>
                        <a href="{{ Request::server('HTTP_REFERER') }}" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection