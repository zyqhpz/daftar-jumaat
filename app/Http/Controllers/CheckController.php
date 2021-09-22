<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Senarai;
use App\Models\Tarikh;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return back()->with('status', 'Nombor ini tiada di dalam rekod. Anda perlu membuat pendaftaran baharu.');
        }
        else {
            // $stats = DB::select('select status_vaksin from users where phone = ?', [$request->input('phone')]);

            $stats = User::where('phone', $request->input('phone'))->first()->status_vaksin;
            $nama = User::where('phone', $request->input('phone'))->first()->name;

            
            if (Senarai::where('phone_id', $request->input('phone'))->count() > 0) {
                
                $keputusan = Senarai::where('phone_id', $request->input('phone'))->first()->status_pendaftaran;
                // $keputusan = DB::table('senarai_nama')->select('status_pendaftaran')->where('phone_id', $request->input('phone'))->get();
                // select status_pendaftaran from senarai_nama where phone_id = '$request->input('phone')'
                // $keputusan = DB::table('senarai_nama')->select('status_pendaftaran')->where('phone_id', $request->input('phone'))->first();

                // $keputusan = DB::select('select status_pendaftaran from senarai_nama where phone_id = ?', [$request->input('phone')]->first());

                // dd($keputusan);

                // dd($stats);

                if ($keputusan == 2) {
                    // return back()->with('status', 'Pendaftaran telah ditutup.');
                    return redirect('/keputusan')->with('berjaya', 'Pendaftaran berjaya')->with('nama', $nama)->with('vaksin', 'Fully Vaccinated');
                }
                else if ($keputusan == 1) {
                    return redirect('/keputusan')->with('gagal', 'Pendaftaran tidak berjaya')->with('nama', $nama)->with('vaksin', 'Fully Vaccinated');
                }
            
            // THISS IS FOR Dummy 
            // if($stats == 2) {
            //     // $nama = DB::select('select name from users where phone = ?', [$request->input('phone')]);
            //     return redirect('/keputusan')->with('vaksin', 'Fully Vaccinated')->with('nama', $nama);
            // }
            // else {
            //     return back()->with('vaksin', 'Partially Vaccinated');
            // }
            }
            
            else {
                return redirect('/semak')->with('status', 'Nombor ini tidak berdaftar lagi. Sila buat pendaftaran giliran.');
            }
        }

        // return redirect('/');
    }
}
