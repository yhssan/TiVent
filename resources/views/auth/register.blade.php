@extends('template.html')
@section('title', 'login')
@section('container')
<div class="container mt-5 col-4">
    <div class="card text-light " style="background-color: darkblue; ">
        <form action="{{ route('postregister') }}" class="form-group p-3" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center p-1">
                <img src="img/tiventlogo.png" alt="TiVent"  style="width: 150px; height: auto;"  class="p-1 text-center">
            </div>
            <h3 class="text-center fw-bold">REGISTER</h3>
            <label for="name">Username</label>
            <input type="text" class="form-control" name="name" placeholder="Masukkan Username" required>

            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required>

            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required> 

            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>

            <div class="text-center">
                <button type="submit" class="btn btn-light mt-4 mb-3 mx-2" style="">Register</button>
                <a href="/" class="btn btn-light mt-4 mb-3 mx-2">Kembali</a>
            </div>
        </form>
    </div> 
</div>    

@endsection