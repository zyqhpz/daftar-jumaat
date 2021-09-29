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
    
    public function store($phone) {
        // $this->validate($phone, [
        //     'phone' => 'required|numeric',
        // ]);
        
        if (!User::where('phone', $phone)->count() > 0) {
            return back()->with('status', 'Nombor ini tiada di dalam rekod. Anda perlu membuat pendaftaran baharu.');
        }
        else {
            // $stats = DB::select('select status_vaksin from users where phone = ?', [$request->input('phone')]);

            $stats = User::where('phone', $phone)->first()->status_vaksin;
            $nama = User::where('phone', $phone)->first()->name;

            
            if (Senarai::where('phone_id', $phone)->count() > 0) {
                
                $keputusan = Senarai::where('phone_id', $phone)->first()->status_pendaftaran;

                // dd($stats);

                if ($keputusan == 2) {
                    // return back()->with('status', 'Pendaftaran telah ditutup.');
                    return redirect('/semak')->with('keputusan', 'Giliran')->with('berjaya', 'Pendaftaran berjaya')->with('nama', $nama)->with('vaksin', 'Fully Vaccinated');
                }
                else if ($keputusan == 1 && $stats == 1) {
                    return redirect('/semak')->with('keputusan', 'Giliran')->with('gagal', 'Pendaftaran tidak berjaya')->with('nama', $nama)->with('vaksin', 'Partially Vaccinated');
                }
                else if ($keputusan == 1 && $stats == 2) {
                    return redirect('/semak')->with('keputusan', 'Giliran')->with('gagal', 'Pendaftaran tidak berjaya')->with('nama', $nama)->with('vaksin', 'Fully Vaccinated');
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
