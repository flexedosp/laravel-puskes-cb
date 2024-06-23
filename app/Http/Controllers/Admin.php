<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index(){
        $data['titlePage'] = 'Login Admin';
        return view('admin.dashboard');
    }
}
