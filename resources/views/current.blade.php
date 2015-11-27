@extends('app')

@section('content')
    <h1>Enter your predictions below</h1>
    
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/current') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @foreach($fixtures as $fixture)
            <div class="col-md-12">
                <div class="col-md-6">
                    <input type="radio" name="{{ $fixture->id }}" value="{{ $fixture->homeTeam }}">
                    <label for="{{ $fixture->id }}">{{ $fixture->homeTeam }}</label>
                </div>
                <div class="col-md-6">
                    <input type="radio" name="{{ $fixture->id }}" value="{{ $fixture->awayTeam }}">
                    <label for="{{ $fixture->id }}">{{ $fixture->awayTeam }}</label>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit Predictions</button>
    </form>
@endsection
