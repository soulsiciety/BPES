@section('header-css', 'sticky-top')
<x-app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li class="current">Unggah Hasil Quisioner</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section ">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            {{-- <h2>Starter Section</h2> --}}
            <p>Unggah Hasil Quisioner</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="shadow p-5 mb-5 bg-white rounded">
                    <form id="form_submit" action="{{ url('quisioner/upload') }}" enctype="multipart/form-data"
                        method="post" data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="alert alert-primary" role="alert">
                            Belum punya template file? Silakan <a href="{{ url('quisioner/template-excel') }}"
                                target="_blank" rel="noopener noreferrer">unduh disini.</a>
                        </div>
                        <div class="row gy-4">

                            <div class="col-md-12">
                                <label for="kode_usaha">Kategori Usaha</label>
                                <select class="form-control" id="kode_usaha" name="kode_usaha">
                                    @foreach ($data['model_usaha'] as $item)
                                        <option value="{{ $item->kode }}">{{ $item->usaha }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan">
                            </div>

                            <div class="col-md-12">
                                <label for="file">File Rekap Quisioner</label>
                                <input title="Upload File" type="file" name="file" class="form-control"
                                    id="file"
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            </div>



                            <div class="col-md-12 text-center">
                                <div id="loading" class="d-none">
                                    <div class="spinner-border text-primary" role="status">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Unggah</button>
                            </div>

                        </div>
                    </form>
                </div>


            </div>

        </div>

    </section><!-- /Starter Section Section -->

    @section('js-file')
        <!--   Core JS Files   -->
        <script src="{{ url('') }}/main/assets/js/core/jquery.3.2.1.min.js"></script>
        <!-- Sweet Alert -->
        <script src="{{ url('') }}/main/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

        <!-- Validation Form -->
        <script src="{{ url('') }}/main/assets/js/plugin/jquery-validate/jquery.form.js"></script>
        <script src="{{ url('') }}/main/assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>
        <script src="{{ url('') }}/main/assets/js/plugin/jquery-validate/additional-methods.min.js"></script>
        <script src="{{ url('') }}/main/assets/js/plugin/jquery-validate/localization/messages_id.min.js"></script>
    @endsection

    @prepend('js')
        <script>
            $('#form_submit').validate({
                submitHandler: function(form, event) {
                    swal({
                        title: 'Konfirmasi',
                        text: 'Apakah anda ingin menggungah data ini?',
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
                            $("#loading").removeClass("d-none");
                            $(form).ajaxSubmit({
                                success: function(res) {
                                    swal({
                                        title: res.success ? 'Berhasil' : 'Error',
                                        text: res.message,
                                        icon: res.success ? 'success' : 'error',
                                        button: 'Ok',
                                    }).then((result) => {
                                        if (res.success) {
                                            window.location = res.url;
                                        } else {
                                            $("#loading").addClass("d-none");
                                        }
                                    });
                                },
                                dataType: 'json'
                            });
                        }
                    });
                },
                rules: {
                    kode_usaha: {
                        required: true,
                    },
                    nama_perusahaan: {
                        required: true,
                    },
                    file: {
                        required: true,
                    },
                },
                messages: {}
            });
        </script>
    @endprepend

</x-app-layout>
