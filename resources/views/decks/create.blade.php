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
                <div class="card-header">Create Deck</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cardflash.decks.store') }}">
                        @csrf

                        <div class="form-group">
                            <label>Deck Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Create Deck</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection