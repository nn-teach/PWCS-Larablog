<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all(); 
        return view('project.index', compact('projects'));

    }

    public function create()
    {
        return view('project.create');
    }

    public function store()
    {
        $project = new Project(); //on instancie un nouveau projet

        $project->title = request('title'); //on set le titre avec la donnée envoyée du formulaire
        $project->description = request('description');

        $project->save(); // on enregistre dans la base

        return redirect('/project'); // méthode pour rediriger vers une autre url (en get par défaut)
 
    }
}
