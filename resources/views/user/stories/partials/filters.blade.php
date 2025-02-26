<div class="row mb-4">
    <div class="col-md-8">
        <h2 class="section-title">Tất Cả Truyện</h2>
    </div>
    <div class="col-md-4">
        <form action="{{ route('user.stories.index') }}" method="GET" class="d-flex gap-2">
            <select name="category" class="form-select" id="categoryFilter">
                <option value="">Tất cả thể loại</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <select name="sort" class="form-select" id="sortOrder">
                <option value="newest" {{ request('sort') == 'newest' || !request('sort') ? 'selected' : '' }}>Mới nhất</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>Xem nhiều nhất</option>
            </select>
            <button type="submit" class="btn btn-primary">Lọc</button>
        </form>
    </div>
</div>