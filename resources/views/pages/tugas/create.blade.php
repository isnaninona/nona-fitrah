@extends('layouts.app')

@section('content')
<div class="main-content container-fluid">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Upload Tugas Baru</h2>
            <p>{{-- $kelas --}}</p>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tugas.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row mx-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul:</strong>
                <input type="text" name="judul_tugas" class="form-control" placeholder="Judul">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea class="form-control" style="height:150px" name="deskripsi_tugas" placeholder="Deskripsi"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deadline:</strong>
                <input type="datetime-local" name="deadline" class="form-control" placeholder="deadline">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pilih Kelas</strong>
                <select name="kelas" class="form-control">
                    <option>...</option>
                    @foreach($kelas as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pilih Mapel</strong>
                <select name="mapel" class="form-control">
                    <option>...</option>
                    @foreach($mapel as $row)
                    <option value="{{$row->id}}">{{$row->mapel}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File Tugas:</strong>
                <input type="file" name="file_tugas" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection