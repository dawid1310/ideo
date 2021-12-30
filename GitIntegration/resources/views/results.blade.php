@extends('layout')
@section('content')
@if ($search_type == 'users')
@foreach ($response as $item)

<div class="user">

    <div>
        <a href="/user?login={{$item['login']}}">
            <div>
                <img src={{ $item['avatar_url'] }} style="width:100%">
                <div class="userdetails">
                    <h4>{{ $item['login'] }}</h4>
                    <h5> <a href="{{ $item['html_url'] }}"> Link do GitHub </a></h5>
                </div>
            </div>
    </div>
    </a>
</div>

@endforeach
@else




<div class="repository">
    <table style="border: solid 1px black">

        <tr>
            <th>Repozytorium</th>
            <th>Właściciel repozytorium</th>
            <th>Link do GitHub</th>
        </tr>

        @foreach ($response as $item)

        <tr>
            <td><a href="/repo?name={{$item['name']}}&&login={{$item['owner']['login']}}">
                    {{ $item['name'] }}</a>
            </td>
            <td>
                <a href="/user?login={{$item['owner']['login']}}">
                    {{ $item['owner']['login'] }}</a>
            </td>
            <td><a href="{{ $item['html_url'] }}"> {{ $item['full_name'] }}</a></td>

        </tr>





        @endforeach
    </table>
</div>
@endif



@endsection