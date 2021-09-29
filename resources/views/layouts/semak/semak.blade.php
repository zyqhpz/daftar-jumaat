@extends('layouts.app')

@section('content')
    <div class="px-4">
        <h1 class="font-extrabold mx-auto justify-center text-center text-lg">
            SISTEM KEHADIRAN SOLAT JUMAAT
            <br>
            MASJID KAMPUNG JOHAN SETIA KLANG
        </h1>

        @if(session()->has('status'))
        <div class="bg-red-500 py-4 px-2 w-10/12 rounded-lg mt-2 text-white font-semibold text-center justify-center mx-auto">
            {{ session()->get('status') }}
        </div>
        @endif
        @if(session()->has('vaksin'))
        <div class="bg-green-500 py-4 px-2 w-10/12 rounded-lg mt-2 text-white font-semibold text-center justify-center mx-auto">
            {{ session()->get('nama') }} telah
            {{ session()->get('vaksin') }}
        </div>
        @endif
        <form method="POST" action="{{ route('semak') }}" class="grid pt-6">
            @csrf
            <label for="phone" class="label text-lg text-gray-700">Masukkan No. Telefon
                <br>
                <small class="font-bold">Tanpa Tanda Sengkang (-)</small>
            </label>
            <input type="tel" minlength="10" maxlength="11" name="phone" placeholder="Contoh: 0123456789" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('phone') border-red-500 @enderror">

            @error('phone')
            <div class="text-red-500 text-sm mt-1">
                Sila isikan nombor telefon anda.
            </div>
            @enderror

            <!-- <input type="submit" value="Semak" class="h-8 rounded-lg bg-green-600 text-white text-bold"> -->
            <button type="submit" class="mt-4 btn-full bg-green-500 hover:bg-green-600 rounded-lg text-white text-bold h-12 justify-center font-semibold tracking-wide"><span class="fas fa-search mr-1"></span>Semak</button>
        </form>
        <a href="#" onclick="routeToDaftar()"><button class="mt-4 mb-6 btn-full bg-green-700 hover:bg-green-800 rounded-lg text-white text-bold h-12 mx-auto w-full justify-center font-semibold tracking-wide">Pendaftaran Giliran</button></a> 
    </div>
@endsection