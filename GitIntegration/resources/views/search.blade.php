@extends('layout')
@section('content')
    <div class="search">
        <form action="/search">
            <label for="searched">Szukana fraza:</label><br>
            <input type="text" id="searched" name="searched"><br>
            <input type="radio" id="repos" name="search_type" value="repositories">
            <label for="repos">Repozytoria</label>
            <input type="radio" id="users" name="search_type" value="users" checked="checked">
            <label for="users">Użytkownicy</label><br><br>
            <label for="sort_by">Sortuj według:</label><br>
            <select id="sort_by" name="sort_by">
                <option value=""></option>
                <option value="stars">Stars</option>
                <option value="forks">Forks</option>
                <option value="updated">Updated</option>
            </select><br>
            <input type="radio" id="asc" name="order" value="asc">
            <label for="asc">Rosnąco</label>
            <input type="radio" id="desc" name="order" value="desc" checked="checked">
            <label for="desc">Malejąco</label><br><br>
            <label for="reults_on_page">Ilość wyszukiwanych rezultatów(max: 100):</label><br>
            <input type="number" id="reults_on_page" name="reults_on_page" min="1" , max="100"><br><br>
            <label for="no_page">Strona wyszukiwań(max: 10):</label><br>
            <input type="number" id="no_page" name="no_page" min="1" , max="10"><br>
            <input type="submit" value="Szukaj" />
        </form>
    </div>

@endsection
