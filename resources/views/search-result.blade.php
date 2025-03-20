<div class="search-container">
    <input type="text" class="search-box" placeholder="Search...">
    @if ($items->isNotEmpty())
        <ul class="search-results-list">
            @foreach ($items as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ul>
    @else
        <div class="no-results">No results found</div>
    @endif
</div>
