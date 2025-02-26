<!-- filepath: /c:/Laravel/ts11/chocopie/resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="welcome-section text-center mb-4">
    <h1>Chào mừng đến với Trang Quản Trị</h1>
    <p class="lead text-muted">Tổng quan về hệ thống Web Đọc Truyện</p>
</div>

<div class="row mb-4">
    <!-- Thống kê số lượng truyện -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 card-stats">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng số truyện</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Story::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-right">
                <a href="{{ route('admin.stories') }}" class="text-primary">Xem chi tiết <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Thống kê số lượng người dùng -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 card-stats">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tổng số người dùng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\User::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-right">
                <a href="{{ route('admin.users') }}" class="text-success">Xem chi tiết <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Thống kê số lượng bình luận -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2 card-stats">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Tổng số bình luận</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\Comment::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-right">
                <a href="{{ route('admin.comments') }}" class="text-info">Xem chi tiết <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    
    <!-- Thống kê số lượng lịch sử đọc -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2 card-stats">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Lượt đọc truyện</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Models\ReadingHistory::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-history fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-right">
                <a href="{{ route('admin.reading-histories') }}" class="text-warning">Xem chi tiết <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Thông tin phiên bản hệ thống -->
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin hệ thống</h6>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <strong>Phiên bản Laravel:</strong> {{ app()->version() }}
                </div>
                <div class="mb-2">
                    <strong>Phiên bản PHP:</strong> {{ phpversion() }}
                </div>
                <div class="mb-2">
                    <strong>Ngày khởi tạo:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hoạt động gần đây</h6>
            </div>
            <div class="card-body">
                <p>Các chức năng tương tác với dữ liệu có thể được truy cập từ menu bên trái.</p>
                <p>Sử dụng các liên kết tương ứng để quản lý:</p>
                <ul>
                    <li>Truyện ngắn</li>
                    <li>Bình luận người dùng</li>
                    <li>Hashtags và thể loại</li>
                    <li>Dữ liệu người dùng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection