<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function checkAuth() {
        // dd('checkAuth');
        dd(Auth::check());
        return Auth::check() ? 
        response()->json([    
            'data' => true
        ])
        :
        response()->json([    
            'data' => false
        ])
        ;
    }
}
