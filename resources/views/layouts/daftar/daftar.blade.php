@extends('layouts.app')

@section('content')
    <div class="px-4">
        <h1 class="font-extrabold mx-auto justify-center text-center text-lg">
            DAFTAR GILIRAN
        </h1>

        <div class="border-green-500 border-2 mt-4 w-1/2 py-2 mx-auto rounded-md">
            <h1 class="text-center font-bold">
                {{-- Jumaat 24/09/2021 --}}
                <span id="hari"></span>
                <span id="tarikh"></span>
            </h1>
        </div>
        
        @if(session()->has('status'))
        <div class="bg-red-500 py-4 px-2 w-10/12 rounded-lg mt-4 text-white font-semibold text-center justify-center mx-auto">
            {{ session()->get('status') }}
        </div>
        @elseif (session()->has('registered'))
        <div class="bg-yellow-500 py-4 px-2 w-10/12 rounded-lg mt-4 text-white font-semibold text-center justify-center mx-auto">
            {{ session()->get('registered') }}
        </div>
        @endif

        <form method="POST" action="{{ route('daftar') }}" class="grid pt-6">
            @csrf
            <label for="phone" class="label text-lg text-gray-700">Sila Isikan No. Telefon
                <br>
                <small class="font-bold">Tanpa Tanda Sengkang (-)</small>
            </label>
            <input type="tel" minlength="10" maxlength="11" name="phone" placeholder="Contoh: 0123456789" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('phone') border-red-500 @enderror">

            @error('phone')
            <div class="text-red-500 text-sm mt-1">
                Sila isikan nombor telefon anda.
            </div>
            @enderror

            <button type="submit" class="mt-4 btn-full bg-green-500 hover:bg-green-600 rounded-lg text-white text-bold h-12 justify-center font-semibold tracking-wide"><span class="fas fa-pencil-alt mr-1"></span>Daftar</button>
        </form>
        <a href="{{ url('/daftar/baru') }}"><button class="mt-4 mb-6 btn-full bg-green-700 hover:bg-green-800 rounded-lg text-white text-bold h-12 mx-auto w-full justify-center font-semibold tracking-wide">Pendaftaran Baharu</button></a> 
    </div>

    <script>
        var d = new Date();
        // d.setDate(d.getDate() + 1);
        // d.setFullYear(2021, 9, 24);
        document.getElementById("tarikh").innerHTML = d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear();
        
        document.getElementById("hari").innerHTML = ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'][d.getDay()];
        </script>
@endsection