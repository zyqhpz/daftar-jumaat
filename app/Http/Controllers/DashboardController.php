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

    public function manage(Request $request) {
        $ahli = User::all();
        $ahli = User::orderBy('id')->get();
        return view('layouts.dashboard.manage_user', compact('ahli'));
    }

    // create a delete method for admin
    public function delete($phone) {
        $ahli = User::where('phone', $phone)->first();
        $ahli->delete();
        return redirect('/dashboard/manage');
    }

    // edit user data from a modal
    // public function update(Request $request) {
    //     if (User::where('phone', $request->input('phone'))->count() > 0) {
    //         return back()->with('status', 'Nombor ini telah didaftarkan dalam sistem. Hubungi pihak AJK jika terdapat sebarang kesulitan.');
    //     }
    //     else {
    //         User::create([
    //             'name' => $request->name,
    //             'address' => $request->address,
    //             'phone' => $request->phone,
    //             'vaksin' => $request->vaksin,
    //             'status_vaksin' => 0,
    //         ]);
    //     }
    // }

    public function update($phone) {
        // dd(request()->all());

        $user = User::where('phone', $phone)->first();
        $user->name = request()->name;
        $user->address = request()->address;
        $user->phone = request()->phone;
        // $user->vaksin = request()->vaksin;
        $user->save();
        return redirect('/dashboard/manage');
    }


    public function edit($phone) {
        // dd("end");
        $user = User::where('phone', $phone)->first();
        return view('layouts.dashboard.edit', compact('user'));
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
