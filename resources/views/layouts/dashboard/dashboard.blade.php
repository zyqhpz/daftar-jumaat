{{-- @if (session('login'))  --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <a href="{{ route('logout') }}">Logout</a>
</head>
<body>
    
</body>
</html>
    
{{-- @else 

@php
// return Redirect::to('/login');
return redirect( route('login') );
    
// redirect to login page if session is not set

@endphp

@endif --}}


