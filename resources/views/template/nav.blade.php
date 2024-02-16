<nav class="navbar navbar-expand-lg fixed-top" style="background-color: darkblue">
   <div class="container p-1">
    <a class="navbar-brand text-light" href="{{ route('welcome') }}">
        <img src="{{ asset('img/tiventlogo.png') }}" alt=""  style="width: 150px; height: auto;">
    </a>
    @auth
    <div class="navbar-nav ml-auto">
        @if (Auth::user()->isUser())
        <a class="nav-link text-light" href="{{ route('order') }}">Pesanan</a>
        <a class="nav-link text-light" href="{{ route('history') }}">Riwayat</a>
        @endif
        @if (Auth::user()->isKasir())
        <a class="nav-link text-light" href="">Penerimaan Pesanan</a>
        @endif
        @if (Auth::user()->isOwner())
        <a class="nav-link text-light" href="">Riwayat</a>
        @endif
        <a class="nav-link btn btn-custom text-light" onclick="return confirm('Are you sure about that?!')" href="{{ route('logout') }}">Logout</a>     
        @else
        <a class="nav-link btn btn-custom text-light" href="{{ route('login') }}">Login Dulu</a>     
        
    </div>
    @endauth
   </div>
        
</nav>                    