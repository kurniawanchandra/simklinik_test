<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index(){
        return view('Role.Admin.dashboard');
    }
}
