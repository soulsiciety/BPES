<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ url('') }}/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ url('') }}/main/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ["{{ url('') }}/assets/css/fonts.css"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('') }}/main/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('') }}/main/assets/css/azzara.min.css">
    <link rel="stylesheet" href="{{ url('') }}/main/assets/css/custom.css">
    <link rel="stylesheet" href="{{ url('') }}/main/assets/css/fonts.css">

    <!-- datepicker -->
    <link rel="stylesheet"
        href="{{ url('') }}/main/assets/js/plugin/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet"
        href="{{ url('') }}/main/assets/js/plugin/bootstrap-clockpicker/bootstrap-clockpicker.min.css">

    <!-- filepond -->
    <link rel="stylesheet" href="{{ url('') }}/main/assets/js/plugin/filepond/filepond.min.css">

    <link rel="stylesheet" href="{{ url('') }}/main/assets/js/plugin/leaflet/leaflet.css">

    @yield('css-file')

    @yield('css')

</head>

<body>
    <div class="wrapper">
        <div class="main-header" data-background-color="purple">
            <!-- Logo Header -->
            @include('layouts.admin.navbar')
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">{{ $title }}</h4>

                        @if ($breadcrumbs)
                            <ul class="breadcrumbs">
                                <li class="nav-home">
                                    <a href="{{ url('') }}">
                                        <i class="flaticon-home"></i>
                                    </a>
                                </li>
                                @foreach ($breadcrumbs as $key => $item)
                                    <li class="separator">
                                        <i class="flaticon-right-arrow"></i>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url($item['url']) }}">{{ $item['title'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                        @endif
                        {{-- <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Forms</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Basic Form</a>
							</li>
						</ul> --}}
                        {{-- <div class="btn-group btn-group-page-header ml-auto">
							<button type="button"
								class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-ellipsis-h"></i>
							</button>
							<div class="dropdown-menu">
								<div class="arrow"></div>
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</div> --}}
                    </div>
                    @yield('row')
                </div>
            </div>

        </div>

    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ url('') }}/main/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="{{ url('') }}/main/assets/js/core/popper.min.js"></script>
    <script src="{{ url('') }}/main/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="{{ url('') }}/main/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{ url('') }}/main/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ url('') }}/main/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="{{ url('') }}/main/assets/js/plugin/moment/moment.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ url('') }}/main/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ url('') }}/main/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ url('') }}/main/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ url('') }}/main/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Datatables -->
    <script src="{{ url('') }}/main/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Validation Form -->
    <script src="{{ url('') }}/main/assets/js/plugin/jquery-validate/jquery.form.js"></script>
    <script src="{{ url('') }}/main/assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{ url('') }}/main/assets/js/plugin/jquery-validate/additional-methods.min.js"></script>

    <!-- Azzara JS -->
    <script src="{{ url('') }}/main/assets/js/ready.min.js"></script>
    <script src="{{ url('') }}/main/assets/js/custom.js"></script>

    @yield('js-file')

    @stack('js')

    <script>
        function ubahpassword() {
            var url = '{{ url('ubahpassword') }}';
            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    $('#modal').html(res).show();
                    $('#myModal').modal('show');
                }
            });
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" role="dialog" id="myModal" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal">
            </div>
        </div>
    </div>

    <!-- Modal Large -->
    <div class="modal bd-example-modal-lg fade" role="dialog" id="myModalL" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modalL">
            </div>
        </div>
    </div>
</body>

</html>
