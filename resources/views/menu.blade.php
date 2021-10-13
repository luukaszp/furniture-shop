<div class="container">
    @isset($categories)
    <h1 style="font-weight:bold">MENU</h1>
    <div class="menu">
        @forelse($categories as $category)
        <ul class="list-group pt-2 pb-2 ps-2 pe-2">
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

    .menu {
        display: inline-flex;
    }

    @media only screen and (max-width: 600px) {
        .menu {
            display: inline-block;
        }
    }
</style>
