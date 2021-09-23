<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Senarai;
use App\Models\Tarikh;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        return view('layouts.dashboard.dashboard');
    }

    public function senarai() {
        $senarai = Senarai::all();
        return view('layouts.dashboard.senarai', compact('senarai'));
    }
    
    public function logout() {
        session()->flush();
        return redirect('/');
    }

    // public function getLogout(){
    //     Session::flush();
    //     return Redirect::to('/');
    // }
}
