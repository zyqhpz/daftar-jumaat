{{-- @extends('layouts.dashboard.manage_user') --}}
@extends('layouts.dashboard.dashboard');

@section('content')
    
<form method="post" class="grid pt-6 w-96 font-black" action='/dashboard/manage/{{ $user['phone'] }}/edit' id="editForm">
    @method('put')
    @csrf

    <input type="hidden" name="id" value="01128589146">
    <label for="phone" class="label text-lg text-gray-700">Nombor Telefon</label>
    <input type="tel" minlength="10" maxlength="11" value="{{ $user['phone'] }}" id="phone" name="phone" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('phone') border-red-500 @enderror">
    
    <label for="name" class="label text-lg text-gray-700 mt-4">Nama Penuh</label>
    <input type="text" id="name" name="name" value="{{ $user['name'] }}" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('name') border-red-500 @enderror">

    <label for="address" class="label text-lg text-gray-700 mt-4">Alamat</label>
    <input type="text" id="address" name="address" value="{{ $user['address'] }}" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('address') border-red-500 @enderror">

    <label for="vaksin" class="label text-lg text-gray-700 mt-4">Status Vaksinasi</label>
    <input type="text" id="vaksin" name="vaksin" value="{{ $user['status_vaksin'] }}" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('address') border-red-500 @enderror">

    <input type="submit" class="btn btn-secondary bg-green-500 mx-auto w-2/3 h-16 mt-2 rounded-md" value="Update">
    <a href="/dashboard/manage" class="mx-auto">
        <input href="/dashboard/manage" class="btn btn-secondary bg-red-500 mx-auto w-2/3 h-16 mt-2 rounded-md" value="Cancel">
    </a>

</form>
@endsection
