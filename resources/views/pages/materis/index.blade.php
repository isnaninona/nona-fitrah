@extends('layouts.app')

@section('content')
<div class="main-content container-fluid">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Daftar Materi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('materis.create') }}"> Upload Materi Baru</a>
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
        <th>Aksi</th>
    </tr>
    @foreach ($materis as $row)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->title }}</td>
        <td>{{ $row->description }}</td>
        <td>
            <form action="{{ route('materis.destroy',$row->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('materis.show',$row->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('materis.edit',$row->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection