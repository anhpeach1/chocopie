<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
    <!-- Font Awesome để sử dụng icons (tùy chọn, nếu bạn muốn dùng icons giống ảnh) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="signup-section">
                <h2>Bạn chưa có tài khoản ?</h2>
                <p>Hãy đăng ký tài khoản ngay để đọc hàng ngàn bộ truyện tranh miễn phí.</p>
                <button class="signup-button">ĐĂNG KÝ</button>
            </div>
            <!-- <div class="dog-image">
                <img src="{{ asset('images/dog_gamer.png') }}" alt="Chú chó chơi game">
            </div> -->
        </div>
        <div class="login-right">
            <div class="login-form-section">
                <h2 class="login-title">Đăng nhập</h2>
                <!-- <div class="avatar-container">
                    <img src="{{ asset('images/fox_avatar.png') }}" alt="Avatar Cáo" class="avatar">
                </div> -->
                <form class="login-form">
                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" placeholder="Password">
                    </div>
                    <button type="submit" class="login-button">ĐĂNG NHẬP</button>
                </form>
                <!-- <div class="social-login">
                    <p>Đăng nhập bằng mạng xã hội</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon google"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon linkedin"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="back-to-home">
                    <a href="#">Quay lại trang chủ</a>
                </div> -->
            </div>
        </div>
    </div>
</body>
</html>