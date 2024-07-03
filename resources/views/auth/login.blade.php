@extends('layouts.admin.main-login')
@section('content')
    <div class="container container-login animated fadeIn">
        <div class="text-center">
            <img class="p-1" class="logo" src="{{ url('/') }}/main/assets/img/jembrana.png" alt="">
            <h3 class="">Sign In To Admin</h3>
        </div>
        <div class="login-form">
            <form id="form_submit" action="{{ url('/login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username" class="placeholder"><b>Username</b></label>
                    <input id="username" name="username" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Password</b></label>
                    <a href="#" class="link float-right">Lupa Password?</a>
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control">
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                        <div class="position-relative">
                            <div class="g-recaptcha" style="transform: scale(1.08);transform-origin: 0 0;" data-sitekey="{{ env('CAPTCHA_SITEKEY') }}"></div>
                            <label id="grecaperrors" class="error d-none" for="grecaperrors"></label>
                        </div>
                    </div> -->
                <div class="form-group form-action-d-flex mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme">
                        <label class="custom-control-label m-0" for="rememberme">Ingat saya</label>
                    </div>
                    <button id="login-btn" type="submit"
                        class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@prepend('js')
    <script>
        $('#form_submit').validate({
            submitHandler: function(form, event) {
                // var recap = grecaptcha.getResponse();
                // if (recap.length != 0) {
                // $('#grecaperrors').removeClass("d-block");
                // $('#grecaperrors').addClass("d-none");
                loadingShow("#login-btn");
                $(form).ajaxSubmit({
                    success: function(res) {
                        loadingHide("#login-btn");
                        if (res.success) {
                            swal({
                                title: res.success ? 'Berhasil' : 'Error',
                                text: res.message,
                                button: false,
                                timer: 2000,
                            });
                            window.setTimeout(function() {
                                window.location = res.url;
                            }, 1500);
                        } else {
                            // grecaptcha.reset();
                            swal({
                                title: res.success ? 'Berhasil' : 'Error',
                                text: res.message,
                                icon: res.success ? 'success' : 'error',
                                button: 'Ok',
                            });
                        }
                    },
                    dataType: 'json'
                });
                // } else {
                // $('#grecaperrors').removeClass("d-none");
                // $('#grecaperrors').addClass("d-block");
                // $('#grecaperrors').text("Wajib diisi!");
                // }
            },
            rules: {
                'username': {
                    required: true,
                },
                'password': {
                    required: true
                },
                // 'g-recaptcha-response': {
                //     required: true
                // },
            },
            messages: {}
        });

        function loadingShow(id) {
            $(id).prop("disabled", true);
            $(id).append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

        }

        function loadingHide(id) {
            $(id).prop("disabled", false);
            $(id).find("span").remove();
        }
    </script>
@endprepend
