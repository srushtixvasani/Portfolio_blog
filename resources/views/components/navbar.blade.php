<nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0 fixed-top">
        <div class="d-flex flex-grow-1">
            <a href="/" class="navbar-brand"> <i class="fas fa-book-open"> </i>  
                PORTFOLIO 
            </a>
            <div class="w-100 text-right">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                <i class="fas fa-bars" style="color:#EA1C2C; font-size:28px;"></i>
                </span>
            </button>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="navLinks">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item">Log In</a>
                </li>
            </ul>
        </div>
</nav>

<div>
    @yield('content')
</div>