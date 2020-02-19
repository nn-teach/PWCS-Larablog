<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Events\ProjectCreated;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project)
    {
        //
       /* $project = new Project(); //on instancie un nouveau projet

        $project->title = request('title'); //on set le titre avec la donnée envoyée du formulaire
        $project->description = request('description');

        $project->save(); // on enregistre dans la base */

 /*        $validation = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]); */
        //return $validation;

/*         Project::create(request(['title', 'description'])); */
        //Project::create($validation);
        $project = Project::create(request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]));

       ProjectCreated::dispatch($project);
       // event(new ProjectCreated(request('title')))

       return redirect('/project'); // méthode pour rediriger vers une autre url (en get par défaut)

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //

        //$project->title = request('title'); //on set le titre avec la donnée envoyée du formulaire
        //$project->description = request('description');

        //$project->update(request(['title', 'description'])); // on enregistre dans la base

        Project::update(request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]));
        return redirect('/project'); // méthode pour rediriger vers une autre url (en get par défaut)

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();

        return redirect('/project');
    }
}
