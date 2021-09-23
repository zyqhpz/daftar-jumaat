<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'vaksin' => 'required',
        ]);

        if (User::where('phone', $request->input('phone'))->count() > 0) {
            return back()->with('status', 'Nombor ini telah didaftarkan dalam sistem. Hubungi pihak AJK jika terdapat sebarang kesulitan.');
        }
        else {
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'vaksin' => $request->vaksin,
            'status_vaksin' => 0,
        ]);

        // return redirect('/');
        return back()->with('berjaya', 'Pendaftaran Berjaya!');
        }
    }
}
