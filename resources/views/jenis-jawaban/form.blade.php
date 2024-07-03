<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Form {{ $title }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form id="form_submit" action="{{ url("admin/$module/save") }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            @csrf
            @if ($data)
                <input type="hidden" name="id" value="{{ $data['id'] }}">
            @endif
            <div class="form-group">
                <label for="jenis_jawaban" class="required">Jenis Jawaban</label>
                <input type="text" class="form-control" id="jenis_jawaban" name="jenis_jawaban"
                    aria-describedby="jenis_jawaban" value="{{ $data ? $data['jenis_jawaban'] : '' }}"
                    placeholder="Jenis Jawaban...">
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-block btn-success">Simpan</button>
        </div>
    </form>
</div>

<script>
    $('#form_submit').validate({
        submitHandler: function(form, event) {
            swal({
                title: 'Konfirmasi',
                text: 'Apakah anda ingin menyimpan data ini?',
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
                    $(form).ajaxSubmit({
                        success: function(res) {
                            swal({
                                title: res.success ? 'Berhasil' : 'Error',
                                text: res.message,
                                icon: res.success ? 'success' : 'error',
                                button: 'Ok',
                            }).then((result) => {
                                if (res.success) {
                                    get_data();
                                    $("#myModalL").modal("hide");
                                }
                            });
                        },
                        dataType: 'json'
                    });
                }
            });
        },
        rules: {
            jenis_jawaban: {
                required: true,
            },
        },
        messages: {}
    });
</script>
