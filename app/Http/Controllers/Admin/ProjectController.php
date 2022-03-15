<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    protected function storagePhoto($photo) {
        if (!empty($photo)) {
            $img_path = Storage::put('uploads/posts', $photo);
            return $img_path;
        }
        return null;
    }
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
        $newProject->screen = $this->storagePhoto($validate['screen']);
        // dd($validate['screen']);
        $newProject->save();

        $technologies_id = $request->technologies;
        $newProject->technologies()->sync($technologies_id);

        // dd($newProject);
        $projects = Project::all();
        return redirect()->route('admin.project.index',compact('projects'));
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
        $validate = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'screen' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $prj = Project::where('id',$id)->get()->first();
        $prj->name = $validate['name'];
        $prj->url = $validate['url'];
        $prj->screen = $this->storagePhoto($validate['screen']);
        // dd($prj);
        $prj->update();


        $projects = Project::all();

        $project_technologies = [];
        foreach ($projects as $prj) {
            $prj['technologies'] = $prj->technologies->all();
        }
        return redirect()->route('admin.project.index',compact('projects'));
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
