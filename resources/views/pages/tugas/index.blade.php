@extends('layouts.app')

@section('content')
<div class="main-content container-fluid">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Daftar Tugas</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('tugas.create') }}"> Upload Tugas Baru</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class='table table-light' id="table_kelas" style="width: 100%">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Kelas</th>
        <th>Mapel</th>
        <th>Nama Guru</th>
        <th>Aksi</th>
    </tr>
    @foreach ($tugas as $row)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->judul_tugas }}</td>
        <td>{{ $row->deskripsi_tugas }}</td>
        <td>{{ $row->kelas }}</td>
        <td>{{ $row->mapel }}</td>
        <td>{{ $row->namaguru}}</td>
        <td>
            <form action="{{ route('tugas.destroy',$row->id_tugas) }}" method="POST">

                <a class="btn btn-info" href="{{ route('tugas.show',$row->id_tugas) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('tugas.edit',$row->id_tugas) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection