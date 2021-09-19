<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return view('layouts.semak.semak');
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'phone' => 'required|numeric',
        ]);
        
        if (!User::where('phone', $request->input('phone'))->count() > 0) {
            return back()->with('status', 'Nombor ini tiada dalam sistem. Sila buat pendaftaran baru');
        }

        // if ($request->only('phone')) {
        //     return back()->with('status', 'Nombor ini tiada dalam sistem. Sila buat pendaftaran baru');
        // }

        return redirect('/');
    }
}
