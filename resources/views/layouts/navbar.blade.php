<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <input type="submit" value="Lọc" class="icon icon-shape bg-primary text-white text-sm rounded-circle shadow">
                    </div>
                    <input class="form-control" type="text" name="datefilter" value="" style="width:300px" autocomplete="off"/>
                </div>
            </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{ asset('assets/img/theme/team-4-800x800.jpg') }}">
                </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="{{ url('/profile') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Thống kê</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ url('/logout') }}" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Đăng xuất</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    @yield('dashboard')
</div>