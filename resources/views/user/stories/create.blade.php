<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Truyện Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <style>
        .cover-preview {
            max-height: 200px;
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .tag-badge {
            margin: 2px;
            padding: 5px 10px;
            background: #e9ecef;
            border-radius: 15px;
            display: inline-block;
        }
        /* New styles for Select2 and form improvements */
        .select2-container--bootstrap-5 .select2-selection {
            min-height: 100px;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
        }
        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            padding: 4px;
        }
        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice {
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 15px;
            padding: 2px 8px;
            margin: 2px;
        }
        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
            margin-right: 5px;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
        }
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .card-header {
            background: linear-gradient(to right, #0d6efd, #0dcaf0);
            color: white;
            border-bottom: none;
        }
        textarea.form-control {
            border: 1px solid #dee2e6;
        }
        .btn-primary {
            background: linear-gradient(to right, #0d6efd, #0dcaf0);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #0b5ed7, #0bacbe);
        }
        /* Add these styles to your existing CSS */
        .select2-container--bootstrap-5 {
            width: 100% !important;
        }

        .select2-container--bootstrap-5 .select2-selection {
            min-height: 45px;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            background-color: #fff;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .select2-container--bootstrap-5 .select2-selection--multiple {
            padding: 6px 8px;
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
            border: none;
            border-radius: 20px;
            color: #fff;
            padding: 4px 12px;
            margin: 2px 4px;
            font-size: 0.9rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice__remove {
            color: #fff;
            margin-right: 8px;
            border: none;
            background: transparent;
            opacity: 0.8;
            font-size: 14px;
        }

        .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__choice__remove:hover {
            opacity: 1;
            background: transparent;
        }

        .select2-container--bootstrap-5 .select2-dropdown {
            border-color: #86b7fe;
            border-radius: 0.375rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .select2-container--bootstrap-5 .select2-results__option {
            padding: 8px 12px;
            font-size: 0.95rem;
        }

        .select2-container--bootstrap-5 .select2-results__option--highlighted {
            background: linear-gradient(45deg, #0d6efd, #0dcaf0);
        }

        .select2-container--bootstrap-5 .select2-search__field {
            border-radius: 0.25rem;
            padding: 6px 12px;
        }

        .category-wrapper {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 0.5rem;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
        }

        .category-label {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #495057;
            font-weight: 600;
        }

        .category-label i {
            margin-right: 8px;
            color: #0d6efd;
        }
    </style>
</head>
<body class="bg-light">
<x-navbar-login />
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.stories.index') }}">
            <i class="fas fa-book-open me-2"></i>Truyện Của Tôi
        </a>
        <div class="navbar-nav ms-auto">
            <a href="{{ route('user.stories.index') }}" class="btn btn-outline-light">
                <i class="fas fa-arrow-left me-2"></i>Quay lại
            </a>
        </div>
    </div>
</nav>

<div class="container py-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-white py-3">
                    <h4 class="card-title mb-0">Tạo Truyện Mới</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.stories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Tên truyện<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mô tả<span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Ảnh bìa</label>
                                <div class="cover-preview text-center">
                                    <img id="coverPreview" src="#" class="img-fluid d-none">
                                    <div id="coverPlaceholder">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                        <p class="mt-2 text-muted">Chọn ảnh bìa</p>
                                    </div>
                                </div>
                                <input type="file" name="cover_image" id="coverInput" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Nội dung truyện<span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="10" required>{{ old('content') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="category-wrapper">
                                    <label class="category-label">
                                        <i class="fas fa-tags"></i>
                                        Thể loại<span class="text-danger">*</span>
                                    </label>
                                    <select name="category_ids[]" class="form-select select2" multiple required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted mt-2 d-block">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Có thể chọn nhiều thể loại
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Từ khóa</label>
                                <input type="text" id="tagInput" class="form-control" placeholder="Nhấn Enter để thêm từ khóa">
                                <div id="tagContainer" class="mt-2"></div>
                                <input type="hidden" name="hashtags" id="hashtagInput">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Độ tuổi</label>
                                <select name="age_rating" class="form-select">
                                    <option value="all">Mọi lứa tuổi</option>
                                    <option value="13+">13+</option>
                                    <option value="16+">16+</option>
                                    <option value="18+">18+</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Trạng thái</label>
                                <select name="status" class="form-select">
                                    <option value="draft">Bản nháp</option>
                                    <option value="published">Xuất bản</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Ngôn ngữ</label>
                                <select name="language" class="form-select">
                                    <option value="vi">Tiếng Việt</option>
                                    <option value="en">Tiếng Anh</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Lưu truyện
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize Select2 with custom options
    $('.select2').select2({
        theme: 'bootstrap-5',
        width: '100%',
        placeholder: 'Chọn thể loại',
        allowClear: true,
        closeOnSelect: false,
        selectionCssClass: 'select2--large',
        dropdownCssClass: 'select2--large',
        templateSelection: function(data) {
            if (!data.id) return data.text;
            return $('<span>' + data.text + '</span>');
        },
        templateResult: function(data) {
            if (!data.id) return data.text;
            return $('<span><i class="fas fa-bookmark me-2"></i>' + data.text + '</span>');
        }
    }).on('select2:opening select2:closing', function( event ) {
        $(this).parent().find('.select2-search__field').blur();
    });

    // Remove duplicate categories
    let seen = new Set();
    $('#category_ids option').each(function() {
        let txt = $(this).text();
        if (seen.has(txt)) {
            $(this).remove();
        } else {
            seen.add(txt);
        }
    });

    // Cover image preview
    $('#coverInput').change(function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#coverPreview').attr('src', e.target.result).removeClass('d-none');
                $('#coverPlaceholder').addClass('d-none');
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Hashtag handling
    let tags = [];
    
    $('#tagInput').on('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            let tag = $(this).val().trim();
            if (tag && !tags.includes(tag)) {
                tags.push(tag);
                updateTags();
            }
            $(this).val('');
        }
    });

    function updateTags() {
        $('#tagContainer').html('');
        tags.forEach((tag, index) => {
            $('#tagContainer').append(`
                <span class="tag-badge">
                    #${tag}
                    <i class="fas fa-times ms-1 text-danger" style="cursor:pointer" 
                       onclick="removeTag(${index})"></i>
                </span>
            `);
        });
        $('#hashtagInput').val(JSON.stringify(tags));
    }

    window.removeTag = function(index) {
        tags.splice(index, 1);
        updateTags();
    }
});
</script>
</body>
</html>