@extends('layouts.app') {{-- Kế thừa layout app.blade.php --}}

@section('content') {{-- Bắt đầu section 'content' --}}

    <header class="header"> {{-- Header của trang web --}}
        <div class="container header-container"> {{-- Container cho header --}}
            <div class="logo">
                <a href="/">
                    <img src="/images/wattpad-logo.svg" alt="Wattpad Logo"> {{-- Logo Wattpad, cần có file wattpad-logo.svg trong public/images --}}
                </a>
            </div>
            <nav class="header-nav"> {{-- Navigation header --}}
                <ul class="nav-list">
                    <li class="nav-item dropdown"> {{-- Dropdown 'Browse' --}}
                        <a href="#" class="nav-link dropdown-toggle">Browse <i class="fas fa-chevron-down"></i></a> {{-- Thêm icon dropdown --}}
                        <div class="dropdown-menu"> {{-- Nội dung dropdown --}}
                            <a href="#" class="dropdown-item">Thể loại 1</a>
                            <a href="#" class="dropdown-item">Thể loại 2</a>
                            {{-- ... Thêm các thể loại khác --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown"> {{-- Dropdown 'Community' --}}
                        <a href="#" class="nav-link dropdown-toggle">Community <i class="fas fa-chevron-down"></i></a> {{-- Thêm icon dropdown --}}
                        <div class="dropdown-menu"> {{-- Nội dung dropdown --}}
                            <a href="#" class="dropdown-item">Diễn đàn</a>
                            <a href="#" class="dropdown-item">Câu lạc bộ đọc sách</a>
                            {{-- ... Thêm các mục khác --}}
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="search-bar"> {{-- Thanh tìm kiếm --}}
                <input type="text" placeholder="Search">
                <button type="submit"><i class="fas fa-search"></i></button> {{-- Icon tìm kiếm --}}
            </div>
            <div class="header-actions"> {{-- Các action bên phải header --}}
                <a href="#" class="write-link">Write</a> {{-- Link 'Write' --}}
                <a href="#" class="try-premium-btn">Try Premium</a> {{-- Button 'Try Premium' --}}
                <div class="user-profile"> {{-- Profile người dùng --}}
                    <a href="#" class="user-profile-link">
                        <span class="user-avatar">A</span> {{-- Avatar người dùng, có thể là ảnh hoặc chữ cái đầu --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right"> {{-- Dropdown menu profile --}}
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="featured-banner"> {{-- Banner chính --}}
        <div class="banner-image">
            <img src="/images/taste-of-sin-banner.jpg" alt="Taste of Sin Banner"> {{-- Banner 'Taste of Sin', cần có file taste-of-sin-banner.jpg trong public/images --}}
        </div>
        <div class="banner-content"> {{-- Nội dung banner --}}
            <h2>Animosity sparks a fire 🔥</h2> {{-- Tiêu đề banner --}}
            <p>Will it ignite their passion or destroy them both?</p> {{-- Mô tả banner --}}
        </div>
    </section>

    <section class="top-picks"> {{-- Section 'Top picks for you' --}}
        <div class="container"> {{-- Container cho section top picks --}}
            <h3>Top picks for you</h3> {{-- Tiêu đề section --}}
            <div class="top-picks-slider"> {{-- Slider chứa các book cover --}}
                <div class="book-cover">
                    <img src="/images/book-cover-1.jpg" alt="Book Cover 1"> {{-- Book cover 1, cần có file book-cover-1.jpg trong public/images --}}
                </div>
                <div class="book-cover">
                    <img src="/images/book-cover-2.jpg" alt="Book Cover 2"> {{-- Book cover 2, cần có file book-cover-2.jpg trong public/images --}}
                </div>
                <div class="book-cover">
                    <img src="/images/book-cover-3.jpg" alt="Book Cover 3"> {{-- Book cover 3, cần có file book-cover-3.jpg trong public/images --}}
                </div>
                <div class="book-cover">
                    <img src="/images/book-cover-4.jpg" alt="Book Cover 4"> {{-- Book cover 4, cần có file book-cover-4.jpg trong public/images --}}
                </div>
                <div class="book-cover">
                    <img src="/images/book-cover-5.jpg" alt="Book Cover 5"> {{-- Book cover 5, cần có file book-cover-5.jpg trong public/images --}}
                </div>
                <div class="book-cover">
                    <img src="/images/book-cover-6.jpg" alt="Book Cover 6"> {{-- Book cover 6, cần có file book-cover-6.jpg trong public/images --}}
                </div>
                {{-- ... Thêm các book cover khác --}}
            </div>
        </div>
    </section>

@endsection {{-- Kết thúc section 'content' --}}