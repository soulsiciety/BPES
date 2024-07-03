@extends('layouts.admin.main')
@section('row')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <button class="btn btn-success btn-sm" onclick="modal(0)"><span class="fas fa-plus"></span>
                                Tambah {{ $title }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            @csrf
                            <table class="table table-responsive table-striped" id="table_id">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Usaha</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@prepend('js')
    <script>
        var url = '{{ url("admin/$module") }}/getdata';
        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            order: [
                [1, "desc"]
            ],
            ajax: {
                url: url,
                type: 'POST',
                data: function(data) {
                    data._token = $('[name=_token]').val();
                },
                dataSrc: function(res) {
                    $('[name=_token]').val(res.csrf);
                    return res.data;
                }
            },
            columns: [{
                    data: 'no',
                    width: '1%',
                    orderable: false,
                    className: 'text-center'
                },
                {
                    data: 'kode',
                },
                {
                    data: 'usaha',
                },
                {
                    data: 'keterangan',
                },
                {
                    data: 'aksi',
                    width: '13%',
                    orderable: false,
                    className: 'text-center',
                    createdCell: function(td, cellData, rowData, row, col) {
                        $(td).html(cellData)
                    }
                }
            ]
        });

        function get_data() {
            table.ajax.reload();
        }

        function modal(id = 0) {
            var url = '{{ url("admin/$module/modal") }}/' + id;
            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    $('#modalL').html(res).show();
                    $('#myModalL').modal('show');
                }
            });
        }

        function hapus(id) {
            swal({
                title: 'Konfirmasi',
                text: 'Apakah anda ingin menghapus data ini?',
                icon: 'warning',
                buttons: {
                    confirm: {
                        text: 'Ya',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        text: 'Tidak',
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((result) => {
                if (result) {
                    var url = '{{ url("admin/$module") }}/' + id;
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            id,
                            _token: $('[name=_token]').val(),
                        },
                        success: function(res) {
                            $('[name=<?= csrf_token() ?>]').val(res.csrf);

                            swal({
                                title: res.success ? 'Berhasil' : 'Error',
                                text: res.message,
                                icon: res.success ? 'success' : 'error',
                                button: 'Ok',
                            });

                            if (res.success)
                                get_data();
                        }
                    });
                }
            });
        }
    </script>
@endprepend
