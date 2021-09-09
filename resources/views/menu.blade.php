<div class="container">
    <div>
        @isset($categories)
        <h1 class="col-3" style="font-weight:bold">MENU</h1>
        @forelse($categories as $category)
        <ul class="list-group col-3">
            <a class="furniture-menu list-group-item" href="/furniture/{{$category->name}}">{{$category->name}}</a>
        </ul>
        @empty
        <h1>Brak kategorii</h1>
        @endforelse
        @else
        @endisset
    </div>
</div>
<style>
    a.furniture-menu:hover {
        background-color: black;
        color:white;
    }
</style>
