<?php

namespace App\Http\Controllers;

use App\Models\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function store(Request $request)
    {  
       $data =  $request->validate([
            'email' => 'required|email|unique:scripts,email'
        ]);
        
        Script::create($data);
        
        return back()->with('status' ,'Script is created');

        



    }
}
