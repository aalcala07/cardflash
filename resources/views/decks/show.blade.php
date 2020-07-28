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
                <div class="card-header">{{ $deck->name }}</div>

                <div class="card-body">

                    @if (!$deck->cards->count())
                        There are no cards in this deck.
                    @else
                    <table class="table table-borderless">
                        <tr>
                            <th>Front</th>
                            <th>Back</th>
                        </tr>
                        @foreach ($deck->cards as $card)
                        <tr>
                            <td width="50%">
                                <div class="card" style="height: 160px;">
                                    <div class="card-body">
                                        {{ $card->primary_text }}<br>
                                        <b>{{ $card->secondary_text }}</b>
                                    </div>
                                </div>
                            </td>
                            <td width="50%">
                                <div class="card" style="height: 160px;">
                                    <div class="card-body">
                                        {{ $card->answer }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection