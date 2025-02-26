<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Quản Lý Truyện</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .story-cover {
            width: 80px;
            height: 120px;
            object-fit: cover;
        }
        .badge-status-draft { background-color: #6c757d; }
        .badge-status-published { background-color: #28a745; }
    </style>
</head>
<body class="bg-light">
<x-navbar-login />
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.stories.dashboard') }}">
            <i class="fas fa-book-open me-2"></i>Dashboard
        </a>
        <div class="navbar-nav ms-auto">
            <a href="{{ route('user.stories.create') }}" class="btn btn-light">
                <i class="fas fa-plus me-2"></i>Tạo Truyện Mới
            </a>
        </div>
    </div>
</nav>

<div class="container py-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h6 class="card-title">Tổng số truyện</h6>
                    <h2>{{ $stories->total() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6 class="card-title">Đã xuất bản</h6>
                    <h2>{{ $stories->where('status', 'published')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h6 class="card-title">Bản nháp</h6>
                    <h2>{{ $stories->where('status', 'draft')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6 class="card-title">Thể loại đã dùng</h6>
                    <h2>{{ $stories->pluck('categories')->flatten()->unique('id')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Quản Lý Truyện</h5>
                </div>
                <div class="col-auto">
                    <form class="d-flex gap-2">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm truyện..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">Tất cả trạng thái</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Bản nháp</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Đã xuất bản</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">Truyện</th>
                            <th>Thể Loại</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Tạo</th>
                            <th class="text-end px-4">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stories as $story)
                        <tr>
                            <td class="px-4">
                                <div class="d-flex align-items-center">
                                    @if($story->cover_image)
                                        <img src="{{ Storage::url($story->cover_image) }}" alt="Cover" class="story-cover rounded me-3">
                                    @else
                                        <div class="story-cover rounded me-3 bg-secondary d-flex align-items-center justify-content-center">
                                            <i class="fas fa-book fa-2x text-white"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1">{{ $story->name }}</h6>
                                        <small class="text-muted">{{ Str::limit($story->description, 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @foreach($story->categories as $category)
                                    <span class="badge bg-info">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <span class="badge badge-status-{{ $story->status }}">
                                    {{ $story->status == 'draft' ? 'Bản nháp' : 'Đã xuất bản' }}
                                </span>
                            </td>
                            <td>{{ $story->created_at->format('d/m/Y') }}</td>
                            <td class="text-end px-4">
                                <a href="{{ route('user.stories.edit', $story->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('user.stories.destroy', $story->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc muốn xóa truyện này?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-book-open fa-3x mb-3"></i>
                                    <p>Bạn chưa có truyện nào. Hãy tạo truyện mới!</p>
                                    <a href="{{ route('user.stories.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tạo Truyện Mới
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($stories->hasPages())
        <div class="card-footer bg-white">
            {{ $stories->links() }}
        </div>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>