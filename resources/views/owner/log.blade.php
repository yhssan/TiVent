@extends('template.html')
@section('title', 'Log')
@section('container')
@include('template.nav')
<div class="container my-3">
    <div class="card card-body">
        <div class="text-center">
            <h4 class="text-white p-3" style="background-color: darkblue; display: inline-block; border-radius: 5px;">Log Aktifitas</h4>
        </div>
        <table class="table table-hover" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Aktifitas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($log as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->activity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>   
<script>
    new DataTable('#example', {
        responsive : true
    })    
</script>     
@endsection