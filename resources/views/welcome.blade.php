@extends('layout')

@section('content')


  @auth
    <h1>Bonjour {{ Auth::user()->name}}!</h1>
  @else
    <h1>Bonjour !</h1>
  @endauth

@endsection

