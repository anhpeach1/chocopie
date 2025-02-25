<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Story Info</title>
    <link rel="stylesheet" href="{{ asset('css/stylets2.css') }}">
    
</head>
<body>
<header class="header">
            <div class="header-left">
                <a href="#" class="back-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </a>
                <span class="header-title">Thêm truyện mới</span>
            </div>
            <div class="header-right">
                <button class="cancel-button">Huỷ</button>
                <button class="skip-button">Đăng bài</button>
            </div>
        </header>
    <div class="container">
        <!-- <header class="header">
            <div class="header-left">
                <a href="#" class="back-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </a>
                <span class="header-title">Thêm truyện mới</span>
            </div>
            <div class="header-right">
                <button class="cancel-button">Huỷ</button>
                <button class="skip-button">Đăng bài</button>
            </div>
        </header> -->

        <main class="main-content">
            <section class="cover-section">
                <div class="cover-placeholder">
                    <div class="add-cover-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                    </div>
                    <div class="add-cover-text">Thêm ảnh bìa</div>
                </div>
                <div class="info-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                </div>
            </section>

            <section class="story-details">
                <div class="section-title">Story Details</div>

                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" id="title" placeholder="Untitled Story">
                </div>

                <div class="form-group">
                    <label for="description">Mô tả
                        <span class="info-icon-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </span>
                    </label>
                    <textarea id="description" rows="3"></textarea>
                </div>

                <!-- <div class="form-group">
                    <label>Main Characters
                        <span class="info-icon-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </span>
                    </label>
                    <div class="main-characters-input">
                        <input type="text" placeholder="Name">
                        <button class="add-character-button">+</button>
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="category">Thể loại
                        <span class="info-icon-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </span>
                    </label>
                    <select id="category">
                        <option value="">Ngẫu nhiên</option>
                        <option value="romance">Truyện ngắn</option>
                        <option value="romance">Kinh dị</option>
                        <option value="romance">Tưởng tượng</option>
        
                        <option value="fantasy">Cổ tích</option>
                        <option value="science_fiction">Hài</option>
                        <option value="mystery">Kinh dị</option>
                        <option value="romance">Tình cảm</option>
                        <option value="romance">Phiêu lưu</option>
                        
                        <!-- Thêm các category khác vào đây -->
                    </select>
                </div>

                <div class="form-group">
                    <label>Từ khoá
                        <span class="info-icon-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </span>
                    </label>
                    <div class="tags-input">
                        <input type="text" placeholder="Add a tag">
                        <button class="add-tag-button">+</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="targetAudience">Giới hạn độ tuổi
                        <span class="info-icon-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </span>
                    </label>
                    <select id="targetAudience">
                        <option value="">Đối tượng chính của bạn là ai</option>
                        <option value="teen">Mọi độ tuổi đều đọc được</option>
                        <option value="adult">Không dành cho trẻ dưới 9 tuổi</option>
                        <option value="adult">Không dành cho ngườidưới 16 tuổi</option>
                        <option value="adult">Dành cho người từ 18 tuổi trở lên</option>
                        <!-- Thêm các target audience khác vào đây -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="targetAudience">Tình trạng
                        <span class="info-icon-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </span>
                    </label>
                    <select id="targetAudience">
                        <option value=""></option>
                        <option value="teen">Đã hoàn thành</option>
                        <option value="teen">Chưa hoàn thành</option>
                        <!-- Thêm các target audience khác vào đây -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="language">Ngôn ngữ sử dụng 
                        <span class="info-icon-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        </span>
                    </label>
                    <select id="language">
                        <option value="english">Tiếng Việt</option>
                        <option value="english">Tiếng Anh</option>
                        <option value="english">Tiếng Pháp</option>
                        <option value="english">Tiếng Ý</option>
                        <option value="english">Tiếng Bỉ</option>

                        <!-- Thêm các ngôn ngữ khác vào đây -->
                    </select>
                </div>

            </section>
        </main>

        
    </div>
    <footer class="footer">
            <!-- <nav class="footer-nav">
                <a href="#">Wattpad Originals</a>
                <a href="#">Try Premium</a>
                <a href="#">Get the App</a>
                <a href="#">Language</a>
                <a href="#">Writers</a>
                <a href="#">Brand Partnerships</a>
                <a href="#">Jobs</a>
                <a href="#">Press</a>
            </nav>
            <nav class="footer-nav footer-bottom-nav">
                <a href="#">Terms</a>
                <a href="#">Privacy</a>
                <a href="#">Payment Policy</a>
                <a href="#">Accessibility</a>
                <a href="#">Help</a>
            </nav> -->
        </footer>
</body>
</html>