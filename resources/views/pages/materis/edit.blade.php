@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Materi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('materis.index') }}"> Back</a>
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

<form action="{{ route('materis.update',$materi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul:</strong>
                <input type="text" name="title" value="{{ $materi->title }}" class="form-control" placeholder="Judul">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Deskripsi">{{ $materi->description }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pilih Kelas</strong>
                <select name="class_room_id" class="form-control">
                    <option>...</option>
                    @foreach($kelas as $row)
                    <option value="{{$row->id}}" @if($row->id == $materi->class_room_id) selected @endif>{{$row->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pilih Mapel</strong>
                <select name="mapel_id" class="form-control">
                    <option>...</option>
                    @foreach($mapel as $row)
                    <option value="{{$row->id}}" @if($row->id == $materi->mapel_id) selected @endif>{{$row->mapel}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File Materi Saat Ini:</strong>
                <div>
                    {{ $materi->file_path }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ganti File Materi:</strong>
                <input type="file" name="file_materi" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file materi.</small>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
@endsection