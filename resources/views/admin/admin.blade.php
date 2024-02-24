@extends('template.html')
@section('title' , 'Admin Events')
@section('container')
@include('template.nav')
<div class="container my-3">
    @if (Session::has('berhasil'))
        <p class="alert alert-success">{{ Session::get('berhasil') }}</p>
    @endif
    @if (Session::has('hapus'))
        <p class="alert alert-danger">{{ Session::get('hapus') }}</p>
    @endif
    <div class="card card-body">
        <div class="text-center">
            <h4 class="text-white p-3" style="background-color: darkblue; display: inline-block; border-radius: 5px;">Laman Utama Admin Event</h4>
        </div>
        @if (auth()->user()->isAdmin())
        <a href="{{ route('tambah') }}" class="btn btn-success w-25 my-2" >Tambah</a>
        @endif
        <table class="table table-hover" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Stok</th>
                   @if (auth()->user()->isAdmin())
                        <th>Update Status</th>
                        <th>Aksi</th>
                   @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($Event as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td widht="150">{{ $event->nama }}</td>
                    <td widht="250">
                        <img src="{{ asset($event->foto) }}" alt="foto" class="img-thumbnail" width="150">
                    </td>
                    <td>{{ $event->status }}</td>
                    <td>{{ number_format($event->stok, 0, ',', '.') }}</td>
                    @if (auth()->user()->isAdmin())
                    <td widht="300">
                        <form action="{{ route('events.update-status', $event->id) }}" method="POST">
                            @csrf
                            <label for="status"class="sr-only" >Update Status</label>
                            <div class="d-flex gap-2">
                                <select name="status" id="status" class=" w-50">
                                    <option value="active"{{ $event->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive"{{ $event->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('edit',$event->id) }}" class="btn btn-warning mt-3"> Edit </a>
                        <a href="{{ route('hapus',$event->id) }}" class="btn btn-danger mt-3" onclick="return confirm('Yakin menghapus?')"> Hapus </a>
                    </td>
                    @endif
                </tr>
                    
                @endforeach

            </tbody>

        </table>
    </div>
</div>
<script>
    new DataTable('#example', {
        responsive: true

    });
</script>
@endsection