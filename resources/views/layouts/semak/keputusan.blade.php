@extends('layouts.app')

@section('content')
    <div class="px-4">
        <h1 class="font-extrabold mx-auto justify-center text-center text-lg">
            SISTEM KEHADIRAN SOLAT JUMAAT
            <br>
            MASJID KAMPUNG JOHAN SETIA KLANG
        </h1>
        @if(session()->has('vaksin'))
            <div class="bg-green-500 py-4 px-2 w-10/12 rounded-lg mt-2 text-white font-semibold text-center justify-center mx-auto">
                {{ session()->get('vaksin') }}
                <h3>
                    Berjaya!
                </h3>
                {{ session()->get('nama') }}
                <h4>
                    Sila hadirkan diri pada hari {{ date('d/m/Y') }}
                </h4>
                <h5>
                    Kegagalan anda untuk hadir akan menyebabkan nama anda disenarai hitam.
                </h5>
            </div>
        @endif
    </div>
@endsection