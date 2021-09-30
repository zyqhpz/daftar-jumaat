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
        // return view('layouts.dashboard.dashboard');
        return view('layouts.dashboard.manage_user');
    }

    // USER
    
    public function manage(Request $request) {
        $ahli = User::all();
        $ahli = User::orderBy('id')->get();
        return view('layouts.dashboard.manage_user', compact('ahli'));
    }

    // create a delete method for admin
    public function delete($phone) {
        $ahli = User::where('phone', $phone)->first();
        $ahli->delete();
        return redirect('/dashboard');
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
        return redirect('/dashboard');
    }


    public function edit($phone) {
        // dd("end");
        $user = User::where('phone', $phone)->first();
        return view('layouts.dashboard.edit', compact('user'));
    }

    // SENARAI TARIKH

    public function list_senarai() {
        // $senarai = Tarikh::all();
        // DB class select all data from table tarikh and table senarai
        $senarai = DB::table('tarikh')
            ->join('senarai_nama', 'senarai_nama.tarikh_id', '=', 'tarikh.tarikh_id')
            ->select('senarai_nama.status_pendaftaran')
            ->get();

        // select 'tarikh' from table tarikh using DB class
        $tarikh = DB::table('tarikh')->get();
        // dd($tarikh);

        // select only with tarikh_id = 1
        // $senarai = Senarai::where('tarikh_id', 1)->orderBy('id')->get();
        // select all from table tarikh
        // $tarikh = Tarikh::all();
        // return view('layouts.dashboard.list_senarai', compact('senarai', 'tarikh'));

        // $senarai = Senarai::where('tarikh_id', 1)->orderBy('id')->get();

        // $senarai = Senarai::orderBy('id')->get();
        return view('layouts.dashboard.senarai.index', compact('tarikh'));
    }

    // SENARAI NAMA

    public function list_senarai_nama($id) {
        $senarai = Senarai::where('tarikh_id', $id)->orderBy('id')->get();
        return view('layouts.dashboard.senarai.senarai_nama', compact('senarai'));
    }

    // LOGOUT
    
    public function logout() {
        session()->flush();
        return redirect('/');
    }

    // public function getLogout(){
    //     Session::flush();
    //     return Redirect::to('/');
    // }
}
