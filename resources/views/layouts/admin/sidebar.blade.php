<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ url('/') }}/main/assets/img/user.png" alt="..."
                        class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Str::title(Auth::user()->name) }}
                            <span class="user-level">{{ Auth::user()->email }}</span>
                            <span class="user-level">{{ Str::title(Auth::user()->kewenangan->ket_kewenangan) }}</span>

                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ url('admin') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item {{ Request::is('admin/jenis-jawaban') ? 'active' : '' }}">
                    <a href="{{ url('admin/jenis-jawaban') }}">
                        <i class="fas fa-address-book"></i>
                        <p>Jenis Jawaban</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/jawaban') ? 'active' : '' }}">
                    <a href="{{ url('admin/jawaban') }}">
                        <i class="fas fa-address-book"></i>
                        <p>Jawaban</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pertanyaan') ? 'active' : '' }}">
                    <a href="{{ url('admin/pertanyaan') }}">
                        <i class="fas fa-address-book"></i>
                        <p>Pertanyaan</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/usaha') ? 'active' : '' }}">
                    <a href="{{ url('admin/usaha') }}">
                        <i class="fas fa-address-book"></i>
                        <p>Usaha</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/personal-identity') ? 'active' : '' }}">
                    <a href="{{ url('admin/personal-identity') }}">
                        <i class="fas fa-address-book"></i>
                        <p>Personal Identity</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Setting</h4>
                </li>
                <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
                    <a href="{{ url('user') }}">
                        <i class="fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-bars"></i>
                        <p>Menu Levels</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a data-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Level 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
