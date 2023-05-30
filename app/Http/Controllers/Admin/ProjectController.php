<?php

namespace App\Http\Controllers\Admin;

use App\http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $validated_data = $request->all();

        $validated_data['slug'] = Project::generateSlug($request->title);

        $checkProject = Project::where('slug', $validated_data['slug'])->first();
        if ($checkProject) {
            return back()->withInput()->withErrors(['slug' => 'Impossibile creare lo slug per questo Project, cambia il titolo']);
        }
        $newProject = Project::create($validated_data);

        //creo collegamento tra il project e gli id del techonlogies
        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }
        return redirect()->route('admin.projects.index', ['project' => $newProject->slug])->with('status', 'Post creato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $projects = Project::all();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validated_data = $request->all();

        $validated_data['slug'] = Project::generateSlug($request->title);

        $checkProject = Project::where('slug', $validated_data['slug'])->where('id', '<>', $project->id)->first();
        if ($checkProject) {
            return back()->withInput()->withErrors(['slug' => 'Impossibile creare lo slug per questo Project, cambia il titolo']);
        }

        //prendo i dati che entrano nella request 
        $project->technologies()->sync($request->technologies);

        $project->update($validated_data);
        return redirect()->route('admin.projects.index', ['project' => $project->slug])->with('status', 'Post modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
