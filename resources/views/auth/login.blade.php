@extends('app')
@section('title') Login @endsection

@section('content')

  {!! Form::open(array('url' => '/auth/login' )) !!}

  {!! Form::label('Email') !!}
  {!! Form::email('email') !!}

  {!! Form::label('password') !!}
  {!! Form::password('password') !!}

  {!! Form::label('Remember Me') !!}
  {!! Form::checkbox('remember') !!}

  {!! Form::submit('Login') !!}

  {!! Form::close() !!}
@endsection
