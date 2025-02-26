<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class AdminStoryController extends Controller
{
    /**
     * Display a listing of stories with filters.
     */
    public function index()
    {
        // Base query
        $storiesQuery = Story::with(['author', 'categories']);
        
        // Search by name if provided
        if (request()->has('search') && request('search') != '') {
            $storiesQuery->where('name', 'like', '%' . request('search') . '%');
        }
        
        // Filter by category if selected
        if (request()->has('category') && request('category') != '') {
            $storiesQuery->whereHas('categories', function($query) {
                $query->where('categories.id', request('category'));
            });
        }
        
        // Apply sorting
        switch(request('sort')) {
            case 'oldest':
                $storiesQuery->oldest();
                break;
            case 'name_asc':
                $storiesQuery->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $storiesQuery->orderBy('name', 'desc');
                break;
            case 'newest':
            default:
                $storiesQuery->latest();
                break;
        }
        
        $stories = $storiesQuery->paginate(10);
        
        return view('admin.stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new story.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.stories.create', compact('categories'));
    }

    /**
     * Store a newly created story.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
            'category_ids' => 'required|array',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $story = Story::create([
            'content' => $validated['content'],
            'description' => $validated['description'],
            'author_id' => Auth::user()->id, // Or how you determine the author
        ]);

        // Handle thumbnail upload if provided
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $story->thumbnail = $path;
            $story->save();
        }

        // Attach categories
        $story->categories()->attach($validated['category_ids']);

        return redirect()->route('admin.stories')
            ->with('success', 'Truyện đã được tạo thành công!');
    }

    /**
     * Display the specified story.
     */
    public function show($id)
    {
        $story = Story::with(['author', 'categories', 'comments.user'])->findOrFail($id);
        return view('admin.stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified story.
     */
    public function edit($id)
    {
        $story = Story::with('categories')->findOrFail($id);
        $categories = Category::all();
        return view('admin.stories.edit', compact('story', 'categories'));
    }

    /**
     * Update the specified story.
     */
    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
            'category_ids' => 'required|array',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $story->update([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'description' => $validated['description'],
        ]);

        // Handle thumbnail upload if provided
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $story->thumbnail = $path;
            $story->save();
        }

        // Sync categories
        $story->categories()->sync($validated['category_ids']);

        return redirect()->route('admin.stories')
            ->with('success', 'Truyện đã được cập nhật thành công!');
    }

    /**
     * Remove the specified story.
     */
    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        // Delete related data if needed
        // $story->comments()->delete();
        
        $story->delete();
        
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        
        return redirect()->route('admin.stories')
            ->with('success', 'Truyện đã được xóa thành công!');
    }

    /**
     * Display the reading history management page
     */
    public function readingHistories()
    {
        // Base query
        $query = \App\Models\ReadingHistory::with(['user', 'story'])
            ->orderBy('read_at', 'desc');
        
        // Filter by user
        if (request()->has('user') && request('user') != '') {
            $query->where('user_id', request('user'));
        }
        
        // Filter by story
        if (request()->has('story') && request('story') != '') {
            $query->where('story_id', request('story'));
        }
        
        // Filter by date range
        if (request()->has('date_from') && request('date_from') != '') {
            $query->whereDate('read_at', '>=', request('date_from'));
        }
        
        if (request()->has('date_to') && request('date_to') != '') {
            $query->whereDate('read_at', '<=', request('date_to'));
        }
        
        $readingHistories = $query->paginate(15);
            
        return view('admin.stories.reading_histories', compact('readingHistories'));
    }

    /**
     * Delete a reading history record
     */
    public function destroyReadingHistory($id)
    {
        $history = \App\Models\ReadingHistory::findOrFail($id);
        $history->delete();
        
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        
        return redirect()->route('admin.reading-histories')
            ->with('success', 'Lịch sử đọc đã được xóa thành công.');
    }
}