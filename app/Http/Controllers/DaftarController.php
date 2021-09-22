<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Senarai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        else if (Senarai::where('phone_id', $request->input('phone'))->count() > 0) {
            return back()->with('registered', 'Nombor ini telah didaftarkan. Semakan boleh dilakukan bermula pada hari Rabu jam 9 pagi.');
        }
        else {
            Senarai::create([
                'phone_id' => $request->phone,
                'tarikh' => date('Y-m-d'),
                'status_pendaftaran' => 0,
                'status_kehadiran' => 0,
                // 'address' => $request->address,
                // 'phone' => $request->phone,
                // 'vaksin' => $request->vaksin
                // get current date to push to column tarikh
                
            ]);
            return back()->with('success', 'Pendaftaran berjaya. Semakan boleh dilakukan bermula pada hari Rabu jam 9 pagi.');
        }

        // if ($request->only('phone')) {
        //     return back()->with('status', 'Nombor ini tiada dalam sistem. Sila buat pendaftaran baru');
        // }

        // return redirect('/');
    }
}
