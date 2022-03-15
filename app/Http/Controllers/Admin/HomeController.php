<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        // dd('Admin/Home@index');
        return view('admin.index');
    }

    public function setAvatar() {

    }
}