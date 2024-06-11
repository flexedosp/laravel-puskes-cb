<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function login(){
        $data['titlePage'] = 'Login Admin';
        return view('admin.login');
    }
}
