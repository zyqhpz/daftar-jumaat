@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')
    <div class="px-4">
        <h1 class="font-extrabold mx-auto justify-center text-center text-lg">
            SISTEM KEHADIRAN SOLAT JUMAAT
            <br>
            MASJID KAMPUNG JOHAN SETIA KLANG
        </h1>

        @if (session()->has('keputusan'))
            @if(session()->get('berjaya'))
            <div class="bg-green-500 py-4 px-2 w-10/12 rounded-lg mt-2 text-white font-semibold text-center justify-center mx-auto">
                {{ session()->get('vaksin') }}
                <h3>
                    {{-- Berjaya! --}}
                    {{ session()->get('berjaya') }}
                </h3>
                {{ session()->get('nama') }}
                <h4>
                    Sila hadirkan diri pada hari {{ date('d/m/Y') }}
                </h4>
                <h5>
                    Kegagalan anda untuk hadir akan menyebabkan nama anda disenarai hitam.
                </h5>
            </div>
            @elseif(session()->has('gagal'))
            <div class="bg-yellow-500 py-4 px-2 w-10/12 rounded-lg mt-2 text-white font-semibold text-center justify-center mx-auto">
                {{ session()->get('vaksin') }}
                <h3>
                    {{-- Gagal! --}}
                    {{ session()->get('gagal') }}
                </h3>
                {{ session()->get('nama') }}
                <h4>
                    Nama anda akan dimasukkan dalam senarai putih untuk giliran minggu hadapan.
                </h4>
            @endif
        @else
            

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
        <form method="POST"  class="grid pt-6" id="checkForm">
            @csrf
            @method('put')
            <label for="phone" class="label text-lg text-gray-700">Masukkan No. Telefon
                <br>
                <small class="font-bold">Tanpa Tanda Sengkang (-)</small>
            </label>
            <input type="tel" minlength="10" maxlength="11" name="phone" id="phone" placeholder="Contoh: 0123456789" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('phone') border-red-500 @enderror">
            @error('phone')
            <div class="text-red-500 text-sm mt-1">
                Sila isikan nombor telefon anda.
            </div>
            @enderror

            <!-- <input type="submit" value="Semak" class="h-8 rounded-lg bg-green-600 text-white text-bold"> -->
            <button type="submit" class="mt-4 btn-full bg-green-500 hover:bg-green-600 rounded-lg text-white text-bold h-12 justify-center font-semibold tracking-wide"><span class="fas fa-search mr-1"></span>Semak</button>
        </form>
        <a href="/daftar-giliran"><button class="mt-4 mb-6 btn-full bg-green-700 hover:bg-green-800 rounded-lg text-white text-bold h-12 mx-auto w-full justify-center font-semibold tracking-wide">Pendaftaran Giliran</button></a> 
        @endif
    </div>
    <script>
        $('#checkForm').submit(function(e){
            if($('#phone').val() == ''){
                e.preventDefault();
                alert('Sila isikan nombor telefon anda.');
            }
        });

        $("#phone").on("change keyup paste", function(){
            $('#checkForm').attr('action', 'semak/' + this.value);
        });
    </script>
@endsection