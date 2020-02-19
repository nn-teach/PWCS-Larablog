@extends('layout')

@section('content')
    <h1>Contact</h1>

  <form
      method="POST"
      action="/contact">
    @csrf
    <div>
        <label for="email">Entrer votre email</label>
        <input type="text" name="email">
        @error('email')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Envoyer un email</button>
    </div>

    @if (session('message'))
        <div>
            {{ session('message')}}
        </div>
    @endif
  </form>

@endsection

