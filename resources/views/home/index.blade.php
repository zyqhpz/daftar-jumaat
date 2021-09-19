@extends('layouts.app')

@section('content')
    <div class="px-6">
        <h1 class="font-extrabold mx-auto justify-center text-center text-lg">
            SISTEM KEHADIRAN SOLAT JUMAAT
            <br>
            MASJID KAMPUNG JOHAN SETIA KLANG
        </h1>
        <div>
            <div class="container justify-center mx-auto flex flex-wrap justify-items-center gap-6">
                <a href="{{ url('/semak') }}"><button class="mt-4 btn-full bg-green-500 hover:bg-green-800 rounded-lg text-white text-bold h-12 mx-auto w-full px-4 justify-center font-semibold tracking-wide shadow-sm">Buat Semakan</button></a> 
                <a href="{{ url('/daftar/giliran') }}"><button class="mt-4 mb-2 btn-full bg-green-500 hover:bg-green-800 rounded-lg text-white text-bold h-12 mx-auto w-full px-4 justify-center font-semibold tracking-wide">Daftar Giliran</button></a> 
                <a href="{{ url('/daftar/baru') }}"><button class="mt-4 mb-6 btn-full bg-green-500 hover:bg-green-800 rounded-lg text-white text-bold h-12 mx-auto w-full px-4 justify-center font-semibold tracking-wide">Pendaftaran Baharu</button></a> 
            </div>
        </div>
    </div>
@endsection