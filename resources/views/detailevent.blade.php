@extends('template.html')
@include('template.nav')
@section('title', 'Detail')
@section('container')
<div class="container mt-4">
    <div class="row">
        <div class="col-5 " style="width:  ">
           
            <div class="card mb-3 p-2" style="min-width:"> <!-- Menambahkan min-width untuk card -->
                    <h5 class="card-title text-center">{{ $Event->nama }}</h5>
                    <img src="{{ asset($Event->foto) }}" alt="" class="card-img-top p-1" style="object-fit: cover; height: auto; width: auto;">
                    <div class="card-body">
                    </div>
            </div>
            <div class="row" style="">
                <div class="col-12 my-2">
                    <div class="d-flex align-items-start">
                        <div class="shadow p-2 flex-grow-1 rounded-start text-center" style="background-color: darkblue;">
                            <img src="{{ asset('img/lokasi.svg') }}" alt="svgg" style="color: azure;" width="auto" height="50px">
                            <h5 class="text-white" style="font-size: 14px; margin-bottom: 0;">Lokasi</h5>
                        </div>
                        <div class="shadow p-1 flex-grow-1 rounded-end bg-white" style="margin-left: -5px; padding: 10px;">
                            <h4 style="font-size: 20px; margin-bottom: 6px;">ICE</h4>
                            <p style="margin-bottom: 0; font-size: 15px;">Minggu, {{ $Event->lokasi,}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 my-2">
                    <div class="d-flex align-items-start">
                        <div class="shadow p-2 flex-grow-1 rounded-start text-center" style="background-color: darkblue;">
                            <img src="{{ asset('img/kalender.svg') }}" alt="svgg" style="color: azure;" width="auto" height="50px">
                            <h5 class="text-white" style="font-size: 14px; margin-bottom: 0;">Waktu</h5>
                        </div>
                        <div class="shadow p-1 flex-grow-1 rounded-end bg-white" style="margin-left: -5px; padding: 10px;">
                            <h4 style="font-size: 20px; margin-bottom: 6px;">1 Hari</h4>
                            <p style="margin-bottom: 0; font-size: 15px;">Minggu, {{ $Event->tanggal,}}, {{  $Event->waktu  }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-7" style="width: ; ">
            <div class="row " style="">
            <div class="card p-2">
                <iframe src="{{ $Event->map }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
                
            </div>
            <form action="{{ route('postorder',$Event->id) }}" class="form-group" method="POST" enctype="">
                @csrf
                <div class="card mt-3 p-2 mb-4">
                    <h5 class="text-center mb-4">Pesan Tiket</h5>
                    <h6 class="card-text">Rp. {{ number_format($Event->harga, 0, ',', '.') }}</h6>
                    <h6 class="card-text">Sisa Tiket: {{ number_format($Event->stok, 0, ',', '.') }}</h6>
                    <label for="banyak" class="form-label">Total Pesanan:</label>
                    <input type="number" name="banyak" class="form-control" required value="1" min="1">
                    <hr>
                    <button type="submit" class="btn btn-primary mb-1">Pesan Sekarang</button>
                    <a href="/" class="btn btn-secondary mb-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection