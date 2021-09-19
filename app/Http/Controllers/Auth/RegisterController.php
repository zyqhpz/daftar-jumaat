<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:11|min:10',
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
