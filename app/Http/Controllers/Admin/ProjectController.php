<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Technology;
use Illuminate\Support\Facades\Storage;

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

        $project_technologies = [];
        foreach ($projects as $prj) {
            $prj['technologies'] = $prj->technologies->all();
        }
        // dd('Admin/Project/Index');
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();

        return view('admin.projects.create',compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
            'screen' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $githubUrl_prefix = "https://github.com/AndrianiClaudio/";

        $newProject = new Project();
        $newProject->name = $validate['name'];
        $newProject->url = $githubUrl_prefix = "https://github.com/AndrianiClaudio/" . $validate['name'];
        if (!empty($validate['screen'])) {
            $img_path = Storage::put('uploads/posts', $validate['screen']);
            $newProject->screen = $img_path;
        }
        $newProject->save();

        $technologies_id = $request->technologies;
        $newProject->technologies()->sync($technologies_id);

        // dd($newProject);
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $prj = Project::where('id',$id)->get()->first();
        return view('admin.projects.edit',compact('prj'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
