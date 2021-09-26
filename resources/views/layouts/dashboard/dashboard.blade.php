{{-- @if (session('login'))  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <link rel="icon" href="data:image/png;base64,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">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <title>Sistem Daftar Solat Jumaat</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body >
    
    {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-900 sm:items-center py-4 sm:pt-0"> --}}
    <div class="relative flex items-top justify-start min-h-screen bg-gray-900 sm:items-center py-4 sm:pt-0" id="here">
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <a class=" text-white" href="{{ route('logout') }}">Logout</a>
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
        <div class="flex items-center p-4 gap-2">
            <div class="flex flex-1 flex-col w-full max-w-md mx-auto gap-2">
                <a href="" onclick="routeToManage()" class="no-underline">
                    <div class="flex justify-center bg-gray-200 w-48 h-20 border-black border-2 align-middle">
                        <h1 class="text-lg text-black no-underline text-center m-auto font-semibold">
                            <i class="fas fa-user-cog"></i>
                            Manage User
                        </h1>
                    </div>
                </a>
                {{-- <a href="{{ url('/dashboard')}}" class="no-underline"> --}}
                <a onclick="routeToHome()" class="no-underline">
                    <div class="flex justify-center bg-gray-200 w-48 h-20 border-black border-2 align-middle">
                        <h1 class="text-lg text-black no-underline text-center m-auto">
                            Senarai
                        </h1>
                    </div>
                </a>
                <a href="{{ url('/dashboard')}}" class="no-underline">
                    <div class="flex justify-center bg-gray-200 w-48 h-20 border-black border-2 align-middle">
                        <h1 class="text-lg text-black no-underline text-center m-auto">
                            Senarai Baru
                        </h1>
                    </div>
                </a>
            </div>

            <div class="bg-gray-600 p-4 w-auto">
                @yield('content')
            </div>
        </div>

    </div>
    
<script src="https://kit.fontawesome.com/36f73a74bd.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>

<script>
    function routeToManage() {
        event.preventDefault();
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/dashboard/manage',
            method: 'get',
            data: {
                CSRF_TOKEN
            },
            success: function(data) {
                // console.log(data);
                $('#here').html(data);  
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    // function routeToManage() {
    //     event.preventDefault();
    //     const xhttp = new XMLHttpRequest();
    //     // const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             document.getElementById("here").innerHTML = this.responseText;
    //         }
    //     };
    //     xhttp.open("GET", "/dashboard/manage", true);
    //     xhttp.send();
    // }

    //     $.ajax({
    //         url: '/dashboard/manage',
    //         type: 'get',
    //         data: {
    //             CSRF_TOKEN
    //         },
    //         success: function(data) {
    //             // console.log(data);
    //             $('#here').html(data);  
    //         }
    //     });
    // }
    function routeToHome() {
        event.preventDefault();
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/dashboard/',
            type: 'get',
            data: {
                CSRF_TOKEN
            },
            success: function(data) {
                // console.log(data);
                $('#here').html(data);
            }
        });
    }
    // function updateData() {
    //           event.preventDefault();
    //           // const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    //           var phone = $('#phone').val();
              
    //           $.ajax({
    //               url: '/dashboard/edit',
    //               type: 'post',
    //               data: {
    //                   phone: phone,
    //                   name: $('#name').val(),
    //                   address: $('#address').val(),
    //                   vaksin: $('#vaksin').val(),
    //                   _token: '{{ csrf_token() }}'
    //               },
    //               success: function(response) {
    //                   console.log("123");
    //                   // $('#here').html(data);  
    //               }
    //         });
</script>


<style>
    @yield('styling')
</style>
    
{{-- @else 

@php
// return Redirect::to('/login');
return redirect( route('login') );
    
// redirect to login page if session is not set

@endphp

@endif --}}


