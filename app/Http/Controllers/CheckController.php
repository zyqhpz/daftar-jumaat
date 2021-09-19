<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return view('layouts.semak.semak');
    }
    
    public function store(Request $request) {
        $this->validate($request(), [
            'phone' => 'required|max:11|min:10',
        ]);
        return redirect('/');
    }
}
