<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KeluhanController extends Controller
{
    
    public function index(){
        Gate::authorize('userActive');
        return view('userLayouts.partialLayouts.keluhan');
    }
}
