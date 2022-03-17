<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Technology;
use Illuminate\Database\Eloquent\Builder;

class ProjectController extends Controller {
    public function all() {
        $projects = Project::where('id','>=',1)->with('technologies')->get(); 

        return response()->json([
            'response' => true,
            'projects' => $projects,
        ]);
    }
    
    public function filterByTechnologies(Request $request) {
        // dd($request->all());
        $technologies_name = $request['technologies'];
        $projects = Project::where('id','>=',1);

        if(count($technologies_name) > 0) {
            foreach ($technologies_name as $tech_name) {
                $projects->whereHas('technologies',function (Builder $query) use ($tech_name) {
                    $query->where('name',$tech_name);
                });
            }
        }

        $projects = $projects->with('technologies')->get();

        return response()->json([
            'response' => true,
            // 'projects' => $request->all()
            'projects' => $projects
            // 'projects' => $projects
        ]);
    }
}
