@extends('layout')

@section('content')
@if ($search_type == 'users')
@foreach ($response as $item)

<div class="w3-row-padding w3-margin-top">
    
        <div class="w3-third">
            <a href="/user?login={{$item['login']}}">
            <div class="w3-card">
                <img src={{ $item['avatar_url'] }} style="width:100%">
                <div class="w3-container">
                    <h4>{{ $item['login'] }}</h4>
                    <h5> <a href="{{ $item['html_url'] }}"> Link do GitHub </a></h5>
                </div>
            </div>
        </div>
    </a>
</div>

@endforeach
@else

@foreach ($response as $item)

<div class="w3-row-padding w3-margin-top">
    
        <div class="w3-third">
            <a href="/repo?name={{$item['name']}}&&login={{$item['owner']['login']}}">
            <div class="w3-card">
                <div class="w3-container">
                    <h3>{{ $item['name'] }}</h3>
                    <h4> <a href="/user?login={{$item['owner']['login']}}"> Właściciel repozytorium: {{ $item['owner']['login'] }}</a></h4>
                    <h4> <a href="{{ $item['html_url'] }}"> Link do GitHub {{ $item['full_name'] }}</a></h4>
                </div>
            </div>
        </div>
    </a>
</div>

@endforeach
    
@endif



@endsection
