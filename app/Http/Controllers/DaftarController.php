<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        return view('layouts.daftar.daftar');
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'phone' => 'required|numeric',
        ]);
        
        if (!User::where('phone', $request->input('phone'))->count() > 0) {
            return back()->with('status', 'Nombor ini tiada dalam sistem. Sila buat pendaftaran baharu');
        }
        else {
            return back()->with('registered', 'Nombor ini telah didaftarkan. Sila lakukan semakan.');
        }

        // if ($request->only('phone')) {
        //     return back()->with('status', 'Nombor ini tiada dalam sistem. Sila buat pendaftaran baru');
        // }

        // return redirect('/');
    }
}
