@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Lihat tugas</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tugas.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Judul:</strong>
            {{ $tugas->judul_tugas }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deskripsi:</strong>
            {{ $tugas->deskripsi_tugas }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>File tugas:</strong>
            <a href="{{ Storage::url($tugas->file_tugas) }}">Download File tugas</a>
        </div>
    </div>
</div>
@endsection