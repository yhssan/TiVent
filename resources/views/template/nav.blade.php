<nav class="navbar navbar-expand-lg fixed-top" style="background-color: darkblue">
   <div class="container p-1">
    <a class="navbar-brand text-light" href="{{ Auth::check() ? 
        (Auth::user()->isAdmin() ? route('admin') : 
            (Auth::user()->isKasir() ? route('pesanan') : 
                (Auth::user()->isOwner() ? route('riwayat') : (Auth::user()->isUser() ? route('welcome') : route('welcome')))))
        : route('welcome') }}">
        <img src="{{ asset('img/tiventlogo.png') }}" alt="logoEvent" style="width: 150px; height: auto;">
    </a>
    
    @auth
    <div class="navbar-nav ml-auto">
        @if (Auth::user()->isUser())
        <a class="nav-link text-light" href="{{ route('order') }}">Pesanan</a>
        <a class="nav-link text-light" href="{{ route('history') }}">Riwayat</a>
        @endif
        
        @if (Auth::user()->isAdmin())
        <a class="nav-link text-light" href="{{ route('admin') }}">Admin</a>
        <a class="nav-link text-light" href="{{ route('pesanan') }}">Pesanan</a>
        <a class="nav-link text-light" href="{{ route('riwayat') }}">Riwayat</a>
        
        @endif
        
        @if (Auth::user()->isKasir())
        <a class="nav-link text-light" href="{{ route('pesanan') }}">Pesanan</a>
        <a class="nav-link text-light" href="{{ route('riwayat') }}">Riwayat</a>
        @endif
        
        @if (Auth::user()->isOwner())
        <a class="nav-link text-light" href="{{ route('admin') }}">Admin</a>
        <a class="nav-link text-light" href="{{ route('log') }}">Catatan</a>
        <a class="nav-link text-light" href="{{ route('riwayat') }}">Riwayat</a>
        @endif
        
        <a class="nav-link btn btn-custom text-light" onclick="return confirm('Are you sure about that?!')" href="{{ route('logout') }}">Logout</a>     
        <p class="text-light my-auto mx-3">Halo, {{ Auth::user()->name }}</p> <!-- Menampilkan nama pengguna yang sedang login -->
        
        @else
        <div class="navbar-nav ml-auto">
            <a class="nav-link text-light " href="{{ route('register') }}">Daftar Akun</a>     
            <a class="nav-link btn btn-custom text-light " href="{{ route('login') }}">Login Dulu</a>     
        </div>
        @endauth
        
        
        
    </div>

   </div>
        
</nav>                    