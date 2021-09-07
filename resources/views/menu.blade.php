<div class="container">
    <div>
        @isset($categories)
        @forelse($categories as $category)
        <ul class="menu col-3">
            <a class="dropdown-item" href="/furniture/{{$category->name}}">{{$category->name}}</a>
        </ul>
        @empty
        <h1>Brak kategorii</h1>
        @endforelse
        @else
        @endisset
    </div>
</div>
