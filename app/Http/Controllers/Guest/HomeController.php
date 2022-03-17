<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        // dd('Guest/Home@index');
        // dd(Auth::check)
        // dd(Auth::id());
        // dd(Auth::id()->role_id);

        if(Auth::check()) {
            $loggedRole = User::where('id',Auth::id())->get()->first()->role_id;
        }
        return Auth::user() && $loggedRole === 1 ? view('admin.index') : view('home');
    }
}
