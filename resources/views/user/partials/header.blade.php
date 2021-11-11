<header class="col-12 headerr">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent navv">
        <a class="navbar-brand nav_logo" href="{{ route('home.index') }}">
            <img src="{{ asset('template_home_html/asset/images/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active pl-2 pr-2 nav_item text-center">
                    <a class="nav-link " href="{{ route('home.index') }}">Home </a>
                </li>
                @if (Auth::check())
                    <li class="nav-item active pl-2 pr-2 nav_item text-center">
                        <a class="nav-link" href="{{ route('home.my_class') }}">Classes </a>
                    </li>
                @else
                    <li class="nav-item active pl-2 pr-2 nav_item text-center"  data-toggle="modal" data-target="#exampleModalMyClass">
                        <div class="nav-link button_myclass" style="cursor: pointer;">Classes </div>
                    </li>
                @endif
            </ul>
            <div
                class="my-2 my-lg-0 d-flex align-items-center justify-content-center mn nav-item dropdown no-arrow mx-1">
                <form class="form-inline my-2 my-lg-0 d-flex align-items-center justify-content-center">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                @if (Auth::check())
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <h5 class=" d-none d-lg-inline text-gray-900">{{ Auth::user()->name }}</h5>
                            <img class="img-profile rounded-circle" style="height: 40px"
                                src="{{ asset('template_admin_boostrap4/img/undraw_profile.svg') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                @else
                    <a href="{{ route('login.form') }}" class="btn btn-success btn-icon-split ml-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Log in</span>
                    </a>
                @endif

            </div>

        </div>
    </nav>
    <!-- Modal -->
</header>
<div class="modal fade" id="exampleModalMyClass" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign in to use this feature</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <a href="{{ route('login.form') }}" type="button"
                    class="btn btn-primary send_request">Login</a>
            </div>
        </div>
    </div>
</div>
