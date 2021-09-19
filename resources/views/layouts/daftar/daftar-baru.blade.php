@extends('layouts.app')

@section('content')
    <div class="px-4">
        <h1 class="font-extrabold mx-auto justify-center text-lg text-center">
            MAKLUMAT DIRI
            <br>
            <span class="font-bold mx-auto text-center justify-center text-md text-gray-700">Pastikan maklumat diisi adalah tepat</span>
        </h1>
        <form action="post" action="{{ route('register') }}" class="grid pt-6">
            @csrf

            <label for="phone" class="label text-lg text-gray-700">Nombor Telefon</label>
                <small class="font-bold text-gray-700">Tanpa Tanda Sengkang (-)</small>
            </label>
            <input type="tel" minlength="10" maxlength="11" name="phone" placeholder="Contoh: 0123456789" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('phone') border-red-500 @enderror">
            
            <label for="name" class="label text-lg text-gray-700 mt-4">Nama Penuh</label>
            <input type="text" name="name" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('name') border-red-500 @enderror">

            <label for="address" class="label text-lg text-gray-700 mt-4">Alamat</label>
            <input required type="text" name="address" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('address') border-red-500 @enderror">

            <label for="vaksin" class="label text-lg text-gray-700 mt-4">Muat Naik Sijil Vaksinasi</label>
            <input required class="mt-2 px-2 rounded-md h-12 border-2 border-black border-opacity-50 py-2 @error('vaksin') border-red-500 @enderror" type="file" name="vaksin">
            
            <!-- <div class="px-2 rounded-md h-12 mb-4 border-2 border-black border-opacity-50">
                <button type="button" class="bg-gray-200 rounded-md mt-2 py-auto" style="display:block;width:120px; height:30px;" onclick="document.getElementById('getFile').click()">Muat Naik</button>
                <input type='file' id="getFile" name="vaksin" style="display:none">
            </div> -->
            
            <!-- <input type="submit" value="Semak" class="h-8 rounded-lg bg-green-600 text-white text-bold"> -->
            <button type="submit" class=" bg-green-500 rounded-lg text-white text-bold h-12 mt-6 mb-4">
                <div class="flex flex-row item-center mx-auto justify-center gap-2">
                    <span class="fas fa-pencil-alt text-xl"></span>
                    <span class="">Daftar</span>
                </div>
            </button>
        </form>
    </div>
@endsection

<!-- TODO
1. Letak logo masjid
2. Letak tarikh hari jumaat pada page daftar
3. Adjust alignment upload file
-->