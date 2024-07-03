<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!-- Favicons -->
    <link href="{{ url('') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ url('') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts and icons -->
    <script src="{{ url('/') }}/main/assets/js/plugin/webfont/webfont.min.js"></script>

    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['../main/assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('/') }}/main/assets/bootstrap-4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/main/assets/css/azzara.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/main/assets/css/custom.css">

</head>

<body class="login">
    <div class="wrapper wrapper-login">
        @yield('content')
    </div>
    <div style="display: none">
        <a
            href="https://www.freepik.com/free-photo/kelingking-beach-sunset-nusa-penida-island-bali-indonesia_11306458.htm#query=background%20bali&position=30&from_view=search&track=sph">Image
            by tawatchai07</a> on Freepik
    </div>

    <script src="{{ url('/') }}/main/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="{{ url('/') }}/main/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{ url('/') }}/main/assets/js/core/popper.min.js"></script>
    <script src="{{ url('/') }}/main/assets/js/core/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/main/assets/js/ready.js"></script>

    <!-- reCAPTCHA -->
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->

    <!-- Validation Form -->
    <script src="{{ url('/') }}/main/assets/js/plugin/jquery-validate/jquery.form.js"></script>
    <script src="{{ url('/') }}/main/assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{ url('/') }}/main/assets/js/plugin/jquery-validate/additional-methods.min.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ url('/') }}/main/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    @yield('js-file')
    @stack('js')
</body>

</html>
