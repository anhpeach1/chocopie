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
        </div>
    </div>
</div>

<!-- Thông tin phiên bản hệ thống -->
@endsection