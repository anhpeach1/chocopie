<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Wattpad.svg/1200px-Wattpad.svg.png" alt="Logo" style="height: 30px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkBrowse" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Browse
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkBrowse">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkCommunity" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Community
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkCommunity">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkWrite" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Write
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLinkWrite">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-2" href="{{ route('login') }}">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-2" href="{{ route('register') }}">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>