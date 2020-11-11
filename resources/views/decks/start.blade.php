@extends('cardflash::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>{{ $deck->name }}</h3>
            <card-deck-two :cards="{{ $cards->toJson() }}"></card-deck-two>
        </div>
    </div>
</div>
@endsection