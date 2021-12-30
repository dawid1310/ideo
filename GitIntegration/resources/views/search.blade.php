@extends('layout')
@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <form action="/search">
                        <label for="searched">Szukana fraza:</label><br>
                        <input type="text" id="searched" name="searched"><br>
                        <input type="radio" id="repos" name="search_type" value="repositories">
                        <label for="repos">Repozytoria</label><br>
                        <input type="radio" id="users" name="search_type" value="users">
                        <label for="users">Użytkownicy</label><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
