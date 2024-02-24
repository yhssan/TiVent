@extends('template.html')
@include('template.nav')
@section('title', 'Home')
@section('container')

{{-- <img src="img/mc.png" alt="" class=" " style="object-fit: cover; height: auto; width:100%"> --}}
<img src="img/banner.jpg" alt="" class=" " style="object-fit: cover; height: 50%; width:100%">

<div class="container mt-3">

    <h5 class="text-white p-3" style="background-color: darkblue; display: inline-block; border-radius: 5px;">Semua Event</h5>
    <div class="row flex-nowrap overflow-auto my-3"> <!-- Menambahkan kelas flex-nowrap dan overflow-auto --> 
        @foreach ($data as $d)
        @if ($d->category->nama == 'Music' || $d->category->nama == 'Jejepangan') 
        <div class="col" style="width: auto">
            <a href="{{ route('detail',$d->id) }}" class="card text-decoration-none mb-4 " style="min-width: 250px; color: black; padding: 0px; overflow: hidden">
                <img src="{{ $d->foto }}" alt="" class="card-img-top p-1 img-fluid" style="object-fit: cover; height: 250px; width: auto;">
                    <div class="p-2">
                        <h5 class="card-title" style="white-space:  ; max-height: 2em">{{ $d->nama }}</h5>
                        <p class="card-subtitle">Tanggal : {{ $d->tanggal }}</p>
                        <p class="card-subtitle">Kategori : {{ $d->category->nama }}</p>
                        <hr>
                        <p class="card-subtitle">Mulai dari Rp <strong>{{ number_format($d->harga, 0, ',', '.') }}</strong></p>
                    </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
    <h5 class="text-white p-3" style="background-color: darkblue; display: inline-block; border-radius: 5px;">Jejepangan</h5>
    <div class="row flex-nowrap overflow-auto my-3"> <!-- Menambahkan kelas flex-nowrap dan overflow-auto -->
        @foreach ($data as $d)
        @if ($d->category->nama == 'Jejepangan')
        <div class="col" style="width: auto">
            <a href="{{ route('detail',$d->id) }}" class="card text-decoration-none mb-4 " style="min-width: 250px; color: black; padding: 0px; overflow: hidden">
                <img src="{{ $d->foto }}" alt="" class="card-img-top p-1 img-fluid" style="object-fit: cover; height: 250px; width: auto;">
                    <div class="p-2">
                        <h5 class="card-title" style="white-space:  ; max-height: 2em">{{ $d->nama }}</h5>
                        <p class="card-subtitle">Tanggal : {{ $d->tanggal }}</p>
                        <p class="card-subtitle">Kategori : {{ $d->category->nama }}</p>
                        <hr>
                        <p class="card-subtitle">Mulai dari Rp <strong>{{ number_format($d->harga, 0, ',', '.') }}</strong></p>
                    </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>

    <h5 class="text-white p-3" style="background-color: darkblue; display: inline-block; border-radius: 5px;">Musik</h5>
    <div class="row flex-nowrap overflow-auto my-3"> <!-- Menambahkan kelas flex-nowrap dan overflow-auto -->
        @foreach ($data as $d)
        @if ($d->category->nama == 'Music')
        <div class="col" style="width: auto">
            <a href="{{ route('detail',$d->id) }}" class="card text-decoration-none mb-4 " style="min-width: 250px; color: black; padding: 0px; overflow: hidden">
                <img src="{{ $d->foto }}" alt="" class="card-img-top p-1 img-fluid" style="object-fit: cover; height: 250px; width: auto;">
                    <div class="p-2">
                        <h5 class="card-title" style="white-space:  ; max-height: 2em">{{ $d->nama }}</h5>
                        <p class="card-subtitle">Tanggal : {{ $d->tanggal }}</p>
                        <p class="card-subtitle">Kategori : {{ $d->category->nama }}</p>
                        <hr>
                        <p class="card-subtitle">Mulai dari Rp <strong>{{ number_format($d->harga, 0, ',', '.') }}</strong></p>
                    </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection
