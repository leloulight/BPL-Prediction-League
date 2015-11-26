@extends('app')
@section('title')Register an account @endsection

@section('content')
  <div class="form">
    {!! Form::open(array('url' => '/auth/register')) !!}

    {!! Form::label('Name') !!}
    {!! Form::text('name') !!}

    {!! Form::label('Email') !!}
    {!! Form::email('email') !!}

    {!! Form::label('Password') !!}
    {!! Form::password('password') !!}

    {!! Form::label('Confirm Password') !!}
    {!! Form::password('password_confirmation') !!}

    {!! Form::submit('Register') !!}

    {!! Form::close() !!}
  </div>
@endsection
