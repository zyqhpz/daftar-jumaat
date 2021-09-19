<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('layouts.daftar.daftar-baru');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required',
            'vaksin' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'vaksin' => $request->vaksin
        ]);

        return redirect('/');
    }
}
