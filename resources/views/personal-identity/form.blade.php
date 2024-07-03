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
                <label for="usaha_id" class="required">Jenis Usaha</label>
                <input type="text" class="form-control" id="usaha_id" name="usaha_id" aria-describedby="usaha_id"
                    value="{{ $data ? $data['usaha_id'] : '' }}" placeholder="Jenis Usaha...">
            </div>
            <div class="form-group">
                <label for="kode" class="required">Kode</label>
                <input type="text" class="form-control" id="kode" name="kode" aria-describedby="kode"
                    value="{{ $data ? $data['kode'] : '' }}" placeholder="Kode...">
            </div>
            <div class="form-group">
                <label for="personal_identity" class="required">Personal Identity</label>
                <input type="text" class="form-control" id="personal_identity" name="personal_identity"
                    aria-describedby="personal_identity" value="{{ $data ? $data['personal_identity'] : '' }}"
                    placeholder="Personal Identity...">
            </div>
            <div class="form-group">
                <label for="deskripsi" class="required">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" aria-describedby="deskripsi"
                    value="{{ $data ? $data['deskripsi'] : '' }}" placeholder="Deskripsi...">
            </div>
            <div class="form-group">
                <label for="story" class="required">Story</label>
                <textarea name="story" class="form-control" cols="20" rows="6">{{ $data ? $data['story'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="foto" class="required">Foto</label>
                <input type="text" class="form-control" id="foto" name="foto" aria-describedby="foto"
                    value="{{ $data ? $data['foto'] : '' }}" placeholder="Foto...">
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
