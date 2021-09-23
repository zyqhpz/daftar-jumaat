<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index() {
        return view('layouts.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        // Admin::where('name', $request->name)->first();
        $user = Admin::where('username', $request->username)->first();

        // $user = DB::select('select username from admins where username = ?', [$request->username])->username;

        // dd($user);

        if ($user) {
            if ($request->password == $user->password) {
                // $request->session()->put('user', $user);
                return redirect('dashboard')->with('login', 'Login Successful');
                // dd('Success');
            } else {
                return redirect('/login')->with('error', 'Sila cuba semula');
                // dd('FAILED');
            }
        } else {
            return redirect('/login')->with('error', 'Sila cuba semula');
        }

        // if (User::where('phone', $request->input('phone'))->count() > 0) {
        //     return back()->with('status', 'Nombor ini telah didaftarkan dalam sistem. Hubungi pihak AJK jika terdapat sebarang kesulitan.');
        // }
        // else {

        // // return redirect('/');
        // return back()->with('berjaya', 'Pendaftaran Berjaya!');
        // }
    }

}
