<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Technology;

class TechnologyController extends Controller
{
    //
    public function all() {
        $technologies = Technology::all();

        $technologies_name = [];
        foreach ($technologies as $tech) {
            // dd($tech->name);
            $technologies_name [] = $tech->name;
        }
        // dd($technologies);
        // dd($technologies_name);

        return response()->json([
            'response' => true,
            'technologies' => $technologies_name
        ]);
    }
}
