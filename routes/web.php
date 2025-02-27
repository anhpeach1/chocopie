<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReadingHistoryController;
// Add these controller imports if you need to create them
use App\Http\Controllers\StoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AdminStoryController;
use App\Http\Controllers\UserStoryController;
Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    if (Auth::user()->userType == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->userType == 'user') {
        return redirect()->route('user.stories.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// User routes
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::prefix('user')->name('user.')->group(function () {
    Route::get('/stories/dashboard', [UserStoryController::class, 'dashboard'])
    ->name('stories.dashboard');
         // Add reading history routes
    Route::get('/reading-histories', [ReadingHistoryController::class, 'index'])->name('reading-histories.index');
    Route::post('/reading-histories', [ReadingHistoryController::class, 'store'])->name('reading-histories.store');
    Route::resource('/stories', UserStoryController::class);
    });
});

// Admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    // Dashboard
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Admin profile
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    
    // Stories management - Fixed slash instead of dot
    Route::get('admin/stories', [AdminStoryController::class, 'index'])->name('admin.stories');
    Route::get('admin/stories/{id}', [AdminStoryController::class, 'show'])->name('admin.stories.show');
    Route::get('admin/stories/{id}/edit', [AdminStoryController::class, 'edit'])->name('admin.stories.edit');
    Route::put('admin/stories/{id}', [AdminStoryController::class, 'update'])->name('admin.stories.update');
    Route::delete('admin/stories/{id}', [AdminStoryController::class, 'destroy'])->name('admin.stories.destroy');
    


    // Reading histories management - CHANGE THIS LINE
    Route::get('admin/reading-histories', [AdminStoryController::class, 'readingHistories'])->name('admin.reading-histories');
    Route::delete('admin/reading-histories/{id}', [AdminStoryController::class, 'destroyReadingHistory'])->name('admin.reading-histories.destroy');
    
    // Hashtags management - Fixed slash instead of dot
    Route::get('admin/hashtags', [AdminController::class, 'hashtags'])->name('admin.hashtags');
    Route::post('admin/hashtags', [AdminController::class, 'storeHashtag'])->name('admin.hashtags.store');
    Route::put('admin/hashtags/{id}', [AdminController::class, 'updateHashtag'])->name('admin.hashtags.update'); // Fixed
    Route::delete('admin/hashtags/{id}', [AdminController::class, 'destroyHashtag'])->name('admin.hashtags.destroy'); // Fixed
    
    // User management - Fixed slash instead of dot
    Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('admin/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
    Route::get('admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit'); // Fixed
    Route::put('admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update'); // Fixed
    Route::delete('admin/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy'); // Fixed
});

// Public story routes
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/{id}', [StoryController::class, 'show'])->name('stories.show');

//
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/{id}', [StoryController::class, 'show'])->name('stories.show');
Route::get('/stories/{id}/read', [StoryController::class, 'read'])->name('stories.read');
Route::post('/stories/{id}/track-view', [StoryController::class, 'trackView'])->name('stories.track-view');