@extends('template.html')
@section('title', 'Pesanan')
@section('container')
@include('template.nav')
<div class="container my-3">
    <div class="card card-body">
        <div class="text-center">
            <h4 class="text-white p-3" style="background-color: darkblue; display: inline-block; border-radius: 5px;">Pesanan</h4>
        </div>

        <table class="table table-hover" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Orders</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nama Event</th>
                    <th>Tiket</th>
                    <th>Bayar</th>
                    <th>Status</th>
                    <th>Bukti</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingOrders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $order->code }}</td>
                    <td>
                        @foreach ($order->detailOrder as $detailOrder)
                        {{ $detailOrder->user->name }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($order->detailOrder as $detailOrder)
                            {{ $detailOrder->user->email }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($order->detailOrder as $detailOrder)
                            {{ $detailOrder->event->nama }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($order->detailOrder as $detailOrder)
                            {{ $detailOrder->qty }} <br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($order->detailOrder as $detailOrder)
                           Rp {{ number_format($detailOrder->pricetotal, 0, ',', '.') }} <br>
                        @endforeach
                    </td>
                    <td width="300">
                        @if (auth()->user()->isAdmin())
                            @foreach ($order->detailOrder as $detailOrder)
                                {{ $detailOrder->status_pembayaran }} <br>
                            @endforeach
                        @else
                        <form action="{{ route('pesanan.update-status', $order->id) }}" method="POST">
                            @csrf
                            <div class="d-flex gap-2">
                                <select name="status_pembayaran" id="status_pembayaran" class="form-control mb-2 w-50">
                                    <option value="pending" selected>Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                                <button type="submit" class="btn btn-outline-dark"> Konfirmasi </button>
                            </div>
                        </form>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-dark m-auto" data-bs-toggle="modal" data-bs-target="#orderModal{{ $loop->index }}">
                            Lihat Foto
                        </button>
                    </td>  
                </tr>
                <div class="modal fade" id="orderModal{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Bukti Pembayaran </h5>
                                <button type="button" class="close" data-bs-dissmiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                @foreach ($order->detailOrder as $detailOrder)
                                <img src="{{ asset($detailOrder->bukti_pembayaran) }}" alt="Proof of Payment" style="max-width: 100%">
                                @endforeach
                            </div>
                        </div>
                   </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    new DataTable('#example',{
        responsive: true
    });
</script>
    
    
@endsection