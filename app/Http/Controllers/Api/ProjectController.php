<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function all() {
        $projects = Project::all(); 
        foreach ($projects as $prj) {
            $prj['technologies'] = $prj->technologies->all();
        }
        // dd($projects);
        return response()->json([
            'response' => true,
            'projects' => $projects,
        ]);
    }
}
