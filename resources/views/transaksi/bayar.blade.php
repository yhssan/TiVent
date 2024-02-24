@extends('template.html')
@section('title', 'Bayar')
@section('container')
@include('template.nav')
<div class="container">
    <div class="card col-6 p-3 mx-auto my-3">
        <form action="{{ route('postbayar', $detailOrder->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="text-center my-4">{{ $Event->nama }}</h4>
            <div class="text-center mb-3">
                <img src="{{ asset($Event->foto)}}" alt="" class="w-50">
            </div>
            <div class="text-center">
                <p class="text-center">QR Dana:
                    <img src="{{ asset('img/qr.jpg') }}" class="img-fluid w-25">
                </p>
                <p class="text-center">Transfer Dana : 0857123456123</p>
            </div>
            <p class="text-center">Transfer BCA : 1123451234</p>
            <p class="text-center">Pesan Tiket: {{ $detailOrder->qty }}</p>
            <p class="text-center">Harga: {{ number_format($detailOrder->pricetotal, 0, ',', '.') }}</p>

            <div class="mb-4">
                <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_pembayaran" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim</button>

        </form>

    </div>
</div>
    
@endsection