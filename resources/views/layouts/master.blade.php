<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>@yield('title')</title> 
    </head>
   @include('partials.nav')

       <div class="container">
        @yield('content')
       </div>

<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
@yield('scripts')


    <footer class="py-3 my-4 bg-secondary-subtle">
         <ul class="nav justify-content-center  pb-3 mb-3"> 
            <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-body-secondary" >Home</a></li> 
            <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link px-2 text-body-secondary" >Users</a></li> 
            <li class="nav-item"><a href="{{route('users.create')}}" class="nav-link px-2 text-body-secondary">Create Users</a></li> 
            </ul> 
            <p class="text-center text-body-secondary">© 2025 CopyRight <a class="text-rest text-body-secondary" href="{{route('home')}}">CreateUsersWithLaravel</a></p>
         </footer> 
        

</body>
</html>
