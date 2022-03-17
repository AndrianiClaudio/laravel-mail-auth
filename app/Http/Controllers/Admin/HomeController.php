<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $loggedRole = User::where('id',Auth::id())->get()->first()->role_id;
        return $loggedRole === 1 ? view('admin.index') : view('home');


        // return view('admin.index') -> accesso a lato admin, attualmente non accessibile
    }
}