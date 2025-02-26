<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Truyện</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .cover-preview {
            max-height: 200px;
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 10px;
        }
        .tag-badge {
            margin: 2px;
            padding: 5px 10px;
            background: #e9ecef;
            border-radius: 15px;
            display: inline-block;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.stories.dashboard') }}">
            <i class="fas fa-book-open me-2"></i>Quản Lý Truyện
        </a>
        <div class="navbar-nav ms-auto">
            <a href="{{ route('user.stories.dashboard') }}" class="btn btn-outline-light">
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
                    <h4 class="card-title mb-0">Chỉnh Sửa Truyện</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.stories.update', $story->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Tên truyện<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required value="{{ old('name', $story->name) }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mô tả<span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $story->description) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Ảnh bìa</label>
                                <div class="cover-preview text-center mb-2">
                                    @if($story->cover_image)
                                        <img id="coverPreview" src="{{ Storage::url($story->cover_image) }}" class="img-fluid">
                                    @else
                                        <img id="coverPreview" src="#" class="img-fluid d-none">
                                        <div id="coverPlaceholder">
                                            <i class="fas fa-image fa-3x text-muted"></i>
                                            <p class="mt-2 text-muted">Chọn ảnh bìa</p>
                                        </div>
                                    @endif
                                </div>
                                <input type="file" name="cover_image" id="coverInput" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Nội dung truyện<span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="10" required>{{ old('content', $story->content) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Thể loại<span class="text-danger">*</span></label>
                                <select name="category_ids[]" class="form-select select2" multiple required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ in_array($category->id, $story->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Từ khóa</label>
                                <input type="text" id="tagInput" class="form-control" placeholder="Nhấn Enter để thêm từ khóa">
                                <div id="tagContainer" class="mt-2">
                                    @foreach($story->hashtags as $hashtag)
                                        <span class="tag-badge">
                                            #{{ $hashtag->name }}
                                            <i class="fas fa-times ms-1 text-danger" style="cursor:pointer" 
                                               onclick="removeTag('{{ $hashtag->name }}')"></i>
                                        </span>
                                    @endforeach
                                </div>
                                <input type="hidden" name="hashtags" id="hashtagInput" 
                                       value="{{ $story->hashtags->pluck('name')->implode(',') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Độ tuổi</label>
                                <select name="age_rating" class="form-select">
                                    <option value="all" {{ $story->age_rating == 'all' ? 'selected' : '' }}>Mọi lứa tuổi</option>
                                    <option value="13+" {{ $story->age_rating == '13+' ? 'selected' : '' }}>13+</option>
                                    <option value="16+" {{ $story->age_rating == '16+' ? 'selected' : '' }}>16+</option>
                                    <option value="18+" {{ $story->age_rating == '18+' ? 'selected' : '' }}>18+</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Trạng thái</label>
                                <select name="status" class="form-select">
                                    <option value="draft" {{ $story->status == 'draft' ? 'selected' : '' }}>Bản nháp</option>
                                    <option value="published" {{ $story->status == 'published' ? 'selected' : '' }}>Xuất bản</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Ngôn ngữ</label>
                                <select name="language" class="form-select">
                                    <option value="vi" {{ $story->language == 'vi' ? 'selected' : '' }}>Tiếng Việt</option>
                                    <option value="en" {{ $story->language == 'en' ? 'selected' : '' }}>Tiếng Anh</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-save me-2"></i>Lưu thay đổi
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
    // Initialize Select2
    $('.select2').select2({
        theme: 'bootstrap-5'
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
    let tags = $('#hashtagInput').val() ? $('#hashtagInput').val().split(',') : [];
    
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
        tags.forEach((tag) => {
            $('#tagContainer').append(`
                <span class="tag-badge">
                    #${tag}
                    <i class="fas fa-times ms-1 text-danger" style="cursor:pointer" 
                       onclick="removeTag('${tag}')"></i>
                </span>
            `);
        });
        $('#hashtagInput').val(tags.join(','));
    }

    window.removeTag = function(tag) {
        tags = tags.filter(t => t !== tag);
        updateTags();
    }
});
</script>
</body>
</html>