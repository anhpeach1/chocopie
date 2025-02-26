<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Hiển thị danh sách bình luận.
     */
    public function index()
    {
        $comments = Comment::with(['user', 'story'])->get();
        return view('comments.index', compact('comments'));
    }

    /**
     * Hiển thị form tạo bình luận.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Lưu trữ bình luận mới.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để bình luận.');
        }

        $validatedData = $request->validate([
            'content' => 'required|string',
            'story_id' => 'required|exists:stories,id',
        ]);

        Comment::create([
            'content' => $validatedData['content'],
            'story_id' => $validatedData['story_id'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được đăng.');
    }

    /**
     * Hiển thị chi tiết bình luận.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment'));
    }

    /**
     * Hiển thị form chỉnh sửa bình luận.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Cập nhật bình luận.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);

        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update($validatedData);

        return redirect()->route('stories.show', $comment->story_id)->with('success', 'Bình luận đã được cập nhật.');
    }

    /**
     * Xóa bình luận.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $storyId = $comment->story_id;
        $comment->delete();

        return redirect()->route('stories.show', $storyId)->with('success', 'Bình luận đã được xóa.');
    }
}