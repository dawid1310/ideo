@extends('layout')
@section('content')

    <h1>Szczegłóy Repozytorium</h1>
    <h4>Nazwa: {{ $repo['name'] }}</h4>
    <h4>Pełna nazwa: {{ $repo['full_name'] }}</h4>
    <div class="w3-row-padding w3-margin-top">
        <a href="/user?login={{ $repo['owner']['login'] }}">
        <h4>Właściciel repozytorium: {{ $repo['owner']['login'] }}</h4>
        <div class="w3-third">
                <div class="w3-card">
                    <img src={{ $repo['owner']['avatar_url'] }} style="width:100%">
                    <div class="w3-container">
                        <h4>{{ $repo['owner']['login'] }}</h4>
                        <h5> <a href="{{ $repo['owner']['html_url'] }}"> Link do GitHub </a></h5>
                    </div>
                </div>
        </div>
        </a>
    </div>
    <h1>Lista użytkowników pracujących w ramach repozytorium</h1>
    @foreach ($contributors as $contributor)

        <div class="w3-row-padding w3-margin-top">

            <div class="w3-third">
                <a href="/user?login={{ $contributor['login'] }}">
                    <div class="w3-card">
                        <img src={{ $contributor['avatar_url'] }} style="width:100%">
                        <div class="w3-container">
                            <h4>{{ $contributor['login'] }}</h4>
                            <h5> <a href="{{ $contributor['html_url'] }}"> Link do GitHub </a></h5>
                        </div>
                    </div>
            </div>
            </a>
        </div>

        

    @endforeach
    <h1>Lista commitów</h1>
    @foreach ($commits as $commit)
        <div class="w3-row-padding w3-margin-top">
            <div class="w3-third">
                    <div class="w3-card">
                        <div class="w3-container">
                            <h4>Coommit: {{ $commit['commit']['message'] }}</h4>
                            <h5>Autor: {{ $commit['commit']['author']['name'] }}</h5>
                            <h5>Commiter: {{ $commit['commit']['committer']['name'] }}</h5>
                            <h5>Data: {{ $commit['commit']['committer']['date'] }}</h5>
                            </h4>
                        </div>
                    </div>
            </div>
        </div>
    @endforeach
@endsection
