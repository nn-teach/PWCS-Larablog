@extends('layout')

@section('content')

  <h1>Créer un nouveau project</h1>
  
  <form method="POST" action="/project">
    @csrf 
    <div>
      <input
          @error('title') style="border-color:red" @enderror
          type="text"
          name="title"
          placeholder="Titre du projet"
          value="{{old('title')}}"
      >
      @error('title')
      <p style="color:red">{{$errors->first('title')}}</p>
      @enderror
    </div>
        <div>
            <textarea name="description" placeholder="Description du projet"></textarea>
        </div>
        <div>
            <button type="submit">Créer le projet</button>
        </div>
    </form>
  
@endsection
