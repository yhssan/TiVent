@extends('template.html')
@section('title', 'login')
@section('container')
<div class="container mt-5 col-4">
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
    @if (Session::has('notif'))
        <p class="alert alert-success">{{ Session::get('notif') }}</p>
        
    @endif
    <div class="card text-light " style="background-color: darkblue; ">
        <form action="{{ route('postlogin') }}" class="form-group p-3" method="POST">
            @csrf
            <div class="text-center p-1">
                <img src="img/tiventlogo.png" alt="TiVent"  style="width: 150px; height: auto" class="p-1 text-center">
            </div>
            <h3 class="text-center fw-bold">Login</h3>
            <label for="">Username</label>
            <input type="text" class="form-control" name="name" placeholder="Masukkan Username" required>
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
            <div class="text-center">
                <button type="submit" class="btn btn-light mt-4 mb-3 mx-2" style="">Masuk</button>
                {{-- <a href="{{ route('register') }}" class="btn btn-light mt-4 mb-3 mx-2">Register</a> --}}
                <p class="text-light">Doesn't have an account?<a href="{{ route('register') }}">Create account </a></p>
            </div>
        </form>
    </div> 
</div>    

@endsection