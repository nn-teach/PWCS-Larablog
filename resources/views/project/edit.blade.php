@extends('layout')

@section('content')

  <h1>Modifier le project {{$project->title}}</h1>
  
  <form method="POST" action="/project/{{$project->id}}">
    @csrf 
    @method('PUT')
        <div>
            <input type="text" name="title" placeholder="Titre du projet" value="{{$project->title}}">
        </div>
        <div>
            <textarea name="description" placeholder="Description du projet">{{$project->description}}</textarea>
        </div>
        <div>
            <button type="submit">Modifier le projet</button>
        </div>
    </form>
  
    <form method="POST" action="/project/{{$project->id}}">
    @csrf 
    @method('DELETE')
        <div>
            <button type="submit">Supprimer le projet</button>
        </div>
    </form>
@endsection