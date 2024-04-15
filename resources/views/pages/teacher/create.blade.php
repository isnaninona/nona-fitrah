@extends('layouts.app')
@section('content')
<div class="main-content container-fluid" style="margin-top: -30px !important">
    <section class="section">
        <a href="{{ route('teachers.index') }}" class="btn icon icon-left btn-primary"><i data-feather="arrow-left"></i>
            Kembali</a>
        <div class="ml-4 mr-4 mt-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Guru Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('teachers.store') }}" method="Post" id="form_teachers" enctype="multipart/form-data" class="form form-horizontal">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" name="nip" class="form-control" placeholder="NIP" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i data-feather="briefcase"></i>
                                                </div>
                                            </div>
                                            <span class="text-danger" id="nip-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nama Lengkap</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" name="fullname" class="form-control" placeholder="Name" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                            <span class="text-danger" id="fullname-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" name="name" class="form-control" placeholder="Username" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i data-feather="user-plus"></i>
                                                </div>
                                            </div>
                                            <span class="text-danger" id="username-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" name="email" class="form-control" placeholder="Email" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i data-feather="mail"></i>
                                                </div>
                                            </div>
                                            <span class="text-danger" id="email-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <select name="jenkel" class="form-control">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="male">Laki Laki</option>
                                                    <option value="female">Perempuan</option>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i data-feather="repeat"></i>
                                                </div>
                                            </div>
                                            <span class="text-danger" id="jenkel-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Photo</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="file" name="photo" class="form-control" placeholder="Photo" id="photo" onchange="previewImage();">
                                                <div class="form-control-icon">
                                                    <i data-feather="file"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="photo-error"></span>
                                        <img id="image-preview" style="width: 150px; display: none" alt="image preview" />
                                    </div>
                                    <div class="col-12 d-flex justify-content-end ">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="application/javascript">
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("photo").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };
</script>
@endsection