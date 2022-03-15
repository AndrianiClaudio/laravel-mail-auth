<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        // dd('Guest/Home@index');
        
        return !Auth::check() ? view('home') : view('admin.index');
    }
    public function contact() {
        return view('home');
        
    }
    public function about() {
        return view('home');
        
    }
}
