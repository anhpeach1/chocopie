<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Placeholder Styles - Add to your style.css or here */
        .banner-placeholder {
            width: 100%;
            height: 400px; /* Banner height */
            background-color: #e0e0e0; /* Light grey placeholder color */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #757575; /* Darker grey text color */
            font-size: 1.2rem;
            border-radius: 8px 8px 0 0; /* Match card image top border radius */
        }

        .book-placeholder {
            width: 100%;
            height: 200px; /* Book card image height */
            background-color: #e0e0e0; /* Light grey placeholder color */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #757575; /* Darker grey text color */
            font-size: 1rem;
            border-radius: 8px 8px 0 0; /* Match card image top border radius */
        }
    </style>

</head>

<body class="font-sans antialiased">
    @auth
        <x-navbar-login />
    @else
        <x-navbar-logout />
    @endauth
    <div class="container">
        <div class="main-banner">
            <div id="mainCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mainCarousel" data-slide-to="1"></li>
                    <li data-target="#mainCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="banner-placeholder">Banner 1</div> <!-- Replaced image with div -->
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Taste of Sin</h5>
                            <p>Will it ignite their passion or destroy them both?</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="banner-placeholder">Banner 2</div> <!-- Replaced image with div -->
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Another Story</h5>
                            <p>Description for banner 2.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="banner-placeholder">Banner 3</div> <!-- Replaced image with div -->
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Yet Another Story</h5>
                            <p>Description for banner 3.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="top-picks mt-4">
            <h2>Truyện dân gian</h2>
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 1</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 1</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 2</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 2</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 3</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 3</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 4</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 4</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 5</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 5</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 6</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 6</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="top-picks mt-4">
            <h2>Cổ tích Việt Nam</h2>
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 1</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 1</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 2</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 2</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 3</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 3</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 4</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 4</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 5</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 5</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 6</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 6</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="top-picks mt-4">
            <h2>Cổ tích thế giới</h2>
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 1</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 1</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 2</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 2</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 3</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 3</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 4</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 4</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 5</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 5</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card">
                        <div class="book-placeholder">Book 6</div> <!-- Replaced image with div -->
                        <div class="card-body">
                            <h6 class="card-title">Book Title 6</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>