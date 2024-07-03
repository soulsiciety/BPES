<div class="logo-header">
    <a href="{{ url('dashboard') }}" class="logo">
        <img src="{{ url('/') }}/assets/img/logo.png" style="height: 20px" alt="navbar brand" class="navbar-brand">
    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fa fa-bars"></i>
        </span>
    </button>
    <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
    <div class="navbar-minimize">
        <button class="btn btn-minimize btn-rounded">
            <i class="fa fa-bars"></i>
        </button>
    </div>
</div>
<!-- End Logo Header -->

<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg">

    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pr-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control">
                </div>
            </form>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false"
                    aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>

            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ url('/') }}/main/assets/img/user.png" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg"><img src="{{ url('/') }}/main/assets/img/user.png"
                                    alt="image profile" class="avatar-img rounded"></div>
                            <div class="u-text">
                                <h4>{{ Str::title(Auth::user()->name) }}</h4>
                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                <span
                                    class="badge badge-secondary">{{ Str::title(Auth::user()->kewenangan->ket_kewenangan) }}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="ubahpassword()" href="#ubahpassword">Ubah Password</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ url('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" style="cursor: pointer">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
