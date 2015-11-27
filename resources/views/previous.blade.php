@extends('app')

@section('content')
    @foreach($fixtures as $matchday)
        <table class="table">
            @if (!empty($matchday))
                <thead>
                    <th class="col-md-1"></th>
                    <th class="col-md-4">Home Team</th>
                    <th class="col-md-2"></th>
                    <th class="col-md-4">Away Team</th>
                    <th class="col-md-1"></th>
                </thead>
            @endif
            
            <tbody>
                @foreach($matchday as $game)
                    <tr class="{{ $game->winner }}">
                        <td class="col-md-1">{{ $game->goalsHome }}</td>
                        <td class="col-md-4">{{ $game->homeTeam }}</td>
                        <td class="col-md-2">vs</td>
                        <td class="col-md-4">{{ $game->awayTeam }}</td>
                        <td class="col-md-1">{{ $game->goalsAway }}</td>
                    </tr>
                @endforeach
            </tbody>
        </div>
    @endforeach
@endsection
