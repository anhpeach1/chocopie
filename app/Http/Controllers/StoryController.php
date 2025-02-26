<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\User;
use App\Models\Category;
use App\Models\Hashtag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    /**
     * Hiển thị danh sách truyện.
     */
    public function index()
    {
        $stories = Story::with(['author', 'categories', 'hashtags'])->get();
        return view('stories.index', compact('stories'));
    }

    /**
     * Hiển thị form tạo truyện mới.
     */
    public function create()
    {
        $authors = User::all();
        $categories = Category::all();
        $hashtags = Hashtag::all();
        return view('stories.create', compact('authors', 'categories', 'hashtags'));
    }

    /**
     * Lưu trữ truyện mới được tạo.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'author_id' => 'required|exists:users,id',
            'age_rating' => 'nullable|string|in:Tất cả,13+,16+,18+',
            'language' => 'nullable|string',
            'cover_image' => 'nullable|url',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:categories,id',
            'hashtag_ids' => 'nullable|array',
            'hashtag_ids.*' => 'exists:hashtags,id',
            'status' => 'nullable|string',
        ]);

        $story = Story::create($validatedData);

        if (isset($validatedData['category_ids'])) {
            $story->categories()->attach($validatedData['category_ids']);
        }
        if (isset($validatedData['hashtag_ids'])) {
            $story->hashtags()->attach($validatedData['hashtag_ids']);
        }

        return redirect()->route('stories.index')->with('success', 'Truyện đã được tạo thành công.');
    }

    /**
     * Hiển thị chi tiết truyện.
     */
    public function show(string $id)
    {
        $story = Story::with(['author', 'categories', 'hashtags', 'comments.user'])->findOrFail($id);
        return view('stories.show', compact('story'));
    }

    /**
     * Hiển thị form chỉnh sửa truyện.
     */
    public function edit(string $id)
    {
        $story = Story::findOrFail($id);
        $authors = User::all();
        $categories = Category::all();
        $hashtags = Hashtag::all();
        $story->load(['categories', 'hashtags']);
        return view('stories.edit', compact('story', 'authors', 'categories', 'hashtags'));
    }

    /**
     * Cập nhật truyện.
     */
    public function update(Request $request, string $id)
    {
        $story = Story::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'author_id' => 'required|exists:users,id',
            'age_rating' => 'nullable|string|in:Tất cả,13+,16+,18+',
            'language' => 'nullable|string',
            'cover_image' => 'nullable|url',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:categories,id',
            'hashtag_ids' => 'nullable|array',
            'hashtag_ids.*' => 'exists:hashtags,id',
            'status' => 'nullable|string',
        ]);

        $story->update($validatedData);

        if (isset($validatedData['category_ids'])) {
            $story->categories()->sync($validatedData['category_ids']);
        } else {
            $story->categories()->detach();
        }

        if (isset($validatedData['hashtag_ids'])) {
            $story->hashtags()->sync($validatedData['hashtag_ids']);
        } else {
            $story->hashtags()->detach();
        }

        return redirect()->route('stories.index')->with('success', 'Truyện đã được cập nhật thành công.');
    }

    /**
     * Xóa truyện.
     */
    public function destroy(string $id)
    {
        $story = Story::findOrFail($id);
        $story->delete();
        return redirect()->route('stories.index')->with('success', 'Truyện đã được xóa thành công.');
    }
}