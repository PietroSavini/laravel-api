<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\technology;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = technology::all();
        $types = type::all();
        return view('admin.projects.create',compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5|max:100',
            'slug' => 'nullable',
            'description' => 'nullable',
            'type_id' => 'nullable|exists:types,id'
        ]);
        $data['slug'] = Str::slug($data['title'], '-');
        $project = new Project();
        $project->fill($data);
        $project->save();
        $technologies=$request->input('technologies',[]);
        if($technologies){
            $project->technologies()->attach($request->technologies);
        }
        return redirect()->route('admin.projects.show', compact('project'));
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
        $technologies = technology::all();
        $types = type::all();
        return view('admin.projects.edit', compact('project','types'));
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
        $data = $request->validate([
            'title' => 'required|min:5|max:100',
            'slug' => 'nullable',
            'description' => 'nullable',
            'type_id' => 'nullable|exists:types,id'
        ]);
        $data['slug'] = Str::slug($data['title'], '-');
        $project->update($data);
        $technologies = $request->input('technologies', []);
        if($technologies) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach($request->technologies);
        }
        return redirect()->route('admin.projects.show', compact('project'));
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
