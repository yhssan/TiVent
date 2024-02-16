@extends('template.html')
@include('template.nav')
@section('title', 'Home')
@section('container')

<img src="img/mc.png" alt="" class=" " style="object-fit: cover; height: auto; width:100%">
<img src="img/banner.jpg" alt="" class=" " style="object-fit: cover; height: 240px; width:100%">

<div class="container mt-3">
    <div class="row flex-nowrap overflow-auto"> <!-- Menambahkan kelas flex-nowrap dan overflow-auto -->
        @foreach ($data as $d)
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
                    {{-- <a href="{{ route('detail', $d->id ) }}" class="btn btn-primary mt-2">Detail</a> --}}
            </a>
            {{-- <div class="card mb-3" style="min-width: 250px;"> <!-- Menambahkan min-width untuk card -->
                <img src="{{ $d->foto }}" alt="" class="card-img-top p-1" style="object-fit: cover; height: 250px; width: auto;">
                <div class="card-body">
                    <h5 class="card-title">{{ $d->nama }}</h5>
                    <p class="card-subtitle">Tanggal : {{ $d->tanggal }}</p>
                    <p class="card-subtitle">Kategori : {{ $d->category->nama }}</p>
                    <a href="{{ route('detail', $d->id ) }}" class="btn btn-primary mt-2">Detail</a>
                </div>
            </div> --}}
        </div>
        @endforeach
    </div>
</div>


@endsection
