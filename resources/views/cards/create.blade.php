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
                <div class="card-header">Edit Card</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cardflash.cards.store') }}">
                        @csrf

                        <input type="hidden" name="deck_id" value="{{ $deck->id }}">

                        <div class="form-group">
                            <label>Primary Text</label>
                            <input type="text" name="primary_text" class="form-control" value="{{ old('primary_text') }}">
                        </div>

                        <div class="form-group">
                            <label>Secondary Text</label>
                            <input type="text" name="secondary_text" class="form-control" value="{{ old('secondary_text') }}">
                        </div>

                        <div class="form-group">
                            <label>Answer</label>
                            <input type="text" name="answer" class="form-control" value="{{ old('answer') }}">
                        </div>

                        <button type="submit" class="btn btn-success">Update Card</button>
                        <a href="{{ Request::server('HTTP_REFERER') }}" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection