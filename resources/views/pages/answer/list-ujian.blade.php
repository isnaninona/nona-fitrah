@extends('layouts.app')
@section('content')
    <div class="main-content container-fluid">
        <section class="section">
            <div class="card mt-2">
                <div class="card-header">
                   Hasil Ujian
                </div>
                <div class="card-body">
                    <table class='table table-light' id="table_participant-session" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Ujian</th>
                                <th>Nama Ujian</th>
                                <th>Soal Pilgan</th>
                                <th>Soal Essay</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script type="application/javascript">
        $(document).ready(function() {
            var id = "{{$id}}";
            $('#table_participant-session').DataTable({
                processing: true,
                serverside: true,
                ajax: {
                    url: '/list-ujian/'+id,
                    type: 'GET'
                },
                responsive: true,
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'kode_ujian',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'soal_pilgan',
                    },
                    {
                        data: 'soal_essay',
                    },
                ]
            })
        })

    </script>
@endsection
