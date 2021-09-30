@extends('layouts.app')

@section('content')
    <div class="px-4">

        @if(session()->has('berjaya'))
        <div class="font-extrabold mx-auto justify-center text-lg text-center">
            <div class="bg-green-500 py-4 px-2 w-10/12 rounded-lg mt-2 text-white font-semibold text-center justify-center mx-auto">
                <h1>
                    {{ session()->get('berjaya') }}
                </h1>
            </div>
        </div>
        @elseif(session()->has('status'))
        <div class="font-extrabold mx-auto justify-center text-lg text-center">
            <div class="bg-red-500 py-4 px-2 w-10/12 rounded-lg mt-2 text-white font-semibold text-center justify-center mx-auto">
                <h1>
                    {{ session()->get('status') }}
                </h1>
            </div>
        </div>
        @else
        <h1 class="font-extrabold mx-auto justify-center text-lg text-center">
            PENDAFTARAN BAHARU
            <br>
            <span class="font-bold mx-auto text-center justify-center text-md text-gray-700">Pastikan maklumat diisi adalah tepat</span>
        </h1>
        <form method="post" action="{{ route('register') }}" class="grid pt-6">
            @csrf

            <label for="phone" class="label text-lg text-gray-700">Nombor Telefon</label>
                <small class="font-bold text-gray-700">Tanpa Tanda Sengkang (-)</small>
            </label>
            <input type="tel" minlength="10" maxlength="11" name="phone" placeholder="Contoh: 0123456789" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('phone') border-red-500 @enderror">

            @error('phone')
            <div class="text-red-500 text-sm mt-1">
                Sila isikan nombor telefon anda.
            </div>
           @enderror
            
            <label for="name" class="label text-lg text-gray-700 mt-4">Nama Penuh</label>
            <input type="text" name="name" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('name') border-red-500 @enderror">

            @error('name')
             <div class="text-red-500 text-sm mt-1">
                 Sila isikan nama penuh anda.
             </div>
            @enderror

            <label for="address" class="label text-lg text-gray-700 mt-4">Alamat</label>
            <input type="text" name="address" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('address') border-red-500 @enderror">

            @error('address')
            <div class="text-red-500 text-sm mt-1">
                Sila isikan alamat rumah anda.
            </div>
           @enderror

            <label for="vaksin" class="label text-lg text-gray-700 mt-4">Muat Naik Sijil Vaksinasi</label>
            <input class="mt-2 px-2 rounded-md h-12 border-2 border-black border-opacity-50 py-2 @error('vaksin') border-red-500 @enderror" type="file" name="vaksin">
            
            @error('vaksin')
            <div class="text-red-500 text-sm mt-1">
                Sila muat naik sijil vaksinasi anda.
            </div>
           @enderror
            <button type="submit" class=" bg-green-500 rounded-lg text-white text-bold h-12 mt-6 mb-4">
                <div class="flex flex-row item-center mx-auto justify-center gap-2">
                    <span class="fas fa-pencil-alt text-xl"></span>
                    <span class="">Daftar</span>
                </div>
            </button>
        </form>
        @endif
    </div>
@endsection

<!-- TODO
1. Letak logo masjid
2. Letak tarikh hari jumaat pada page daftar
3. Adjust alignment upload file
-->