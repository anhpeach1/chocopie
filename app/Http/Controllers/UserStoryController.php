<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Category;
use App\Models\Hashtag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserStoryController extends Controller
{
    /**
     * Display a listing of the user's stories.
     */
    public function index()
    {
        $stories = Story::where('author_id', Auth::id())
            ->with(['categories', 'hashtags'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new story.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $hashtags = Hashtag::orderBy('name')->get();
        return view('user.stories.create', compact('categories', 'hashtags'));
    }

    /**
     * Store a newly created story in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'age_rating' => 'required|in:all,13+,16+,18+',
            'language' => 'required|in:vi,en',
            'hashtags' => 'nullable|string'
        ]);

        // Set author as current user
        $validatedData['author_id'] = Auth::id();

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('covers', 'public');
            $validatedData['cover_image'] = $imagePath;
        }

        // Create story
        $story = Story::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
            'cover_image' => $validatedData['cover_image'] ?? null,
            'status' => $validatedData['status'],
            'age_rating' => $validatedData['age_rating'],
            'language' => $validatedData['language'],
            'author_id' => $validatedData['author_id']
        ]);

        // Attach categories
        if (!empty($validatedData['category_ids'])) {
            $story->categories()->attach($validatedData['category_ids']);
        }

        // Handle hashtags
        if (!empty($validatedData['hashtags'])) {
            $hashtags = json_decode($validatedData['hashtags']);
            foreach ($hashtags as $tagName) {
                $story->hashtags()->create(['name' => trim($tagName)]);
            }
        }

        return redirect()->route('user.stories.dashboard')
            ->with('success', 'Truyện đã được tạo thành công');
    }

    /**
     * Display the specified story.
     */
    public function show($id)
    {
        $story = Story::where('author_id', Auth::id())
            ->with(['categories', 'hashtags', 'comments.user'])
            ->findOrFail($id);
            
        return view('user.stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified story.
     */
    public function edit($id)
    {
        // Get the story that belongs to the current user
        $story = Story::where('author_id', Auth::id())
            ->with(['categories', 'hashtags'])
            ->findOrFail($id);

        // Get all categories
        $categories = Category::orderBy('name')->get();

        // Get story hashtags as comma-separated string
        $hashtags = $story->hashtags->pluck('name')->implode(',');

        return view('user.stories.edit', compact('story', 'categories', 'hashtags'));
    }

    /**
     * Update the specified story in storage.
     */
    public function update(Request $request, $id)
    {
        $story = Story::where('author_id', Auth::id())->findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'age_rating' => 'required|in:all,13+,16+,18+',
            'language' => 'required|in:vi,en',
            'hashtags' => 'nullable|string'
        ]);

        // Handle cover image update
        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($story->cover_image) {
                Storage::disk('public')->delete($story->cover_image);
            }
            $validatedData['cover_image'] = $request->file('cover_image')
                ->store('covers', 'public');
        }

        // Update story details
        $story->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
            'cover_image' => $validatedData['cover_image'] ?? $story->cover_image,
            'status' => $validatedData['status'],
            'age_rating' => $validatedData['age_rating'],
            'language' => $validatedData['language']
        ]);

        // Update categories
        $story->categories()->sync($validatedData['category_ids']);

        // Update hashtags
        $story->hashtags()->delete(); // Delete existing hashtags
        if (!empty($validatedData['hashtags'])) {
            $hashtags = explode(',', $validatedData['hashtags']);
            foreach ($hashtags as $tagName) {
                $story->hashtags()->create([
                    'name' => trim($tagName)
                ]);
            }
        }

        return redirect()->route('user.stories.dashboard')
            ->with('success', 'Truyện đã được cập nhật thành công');
    }

    /**
     * Remove the specified story from storage.
     */
    public function destroy($id)
    {
        $story = Story::where('author_id', Auth::id())->findOrFail($id);

        // Delete cover image if exists
        if ($story->cover_image) {
            Storage::disk('public')->delete($story->cover_image);
        }

        // Delete relationships first
        $story->categories()->detach(); // This is a belongsToMany relationship, so detach() works
        $story->hashtags()->delete();   // For hasMany relationship, use delete()
        $story->comments()->delete();    // For hasMany relationship, use delete()
        $story->readingHistories()->delete(); 

        // Delete the story
        $story->delete();

        return redirect()->route('user.stories.dashboard')
            ->with('success', 'Truyện đã được xóa thành công');
    }

    public function dashboard()
    {
        $stories = Story::where('author_id', Auth::id())
            ->with(['categories', 'hashtags'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.stories.dashboard', compact('stories'));
    }
}