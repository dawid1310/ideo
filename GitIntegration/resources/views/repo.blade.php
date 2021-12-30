@extends('layout')

@section('content')


    <div>
        <div class="user">
            <div>
                <a href="/user?login={{ $repo['owner']['login'] }}">

                    <div>
                        <img src={{ $repo['owner']['avatar_url'] }} style="width:100%;">
                        <div class="userdetails">
                            <h4>{{ $repo['owner']['login'] }}</h4>
                            <h5> <a href="{{ $repo['owner']['html_url'] }}"> Link do GitHub </a></h5>
                        </div>
                    </div>
            </div>
            </a>
        </div>
        <div>
            <h1>Szczegóły Repozytorium</h1>
            <h4>Właściciel repozytorium: {{ $repo['owner']['login'] }}</h4>
            <h4>Nazwa repozytorium: {{ $repo['name'] }}</h4>
            <h4>Pełna nazwa: {{ $repo['full_name'] }}</h4>
        </div>
    </div>

    <div class="collaborators">
        <h1>Lista użytkowników pracujących w ramach repozytorium</h1>
        @foreach ($contributors as $contributor)

            <div class="user">

                <div class="">
                    <a href="/user?login={{ $contributor['login'] }}">
                        <div class="w3-card">
                            <img src={{ $contributor['avatar_url'] }} style="width:100%">
                            <div class="userdetails">
                                <h4>{{ $contributor['login'] }}</h4>
                                <h5> <a href="{{ $contributor['html_url'] }}"> Link do GitHub </a></h5>
                            </div>
                        </div>
                </div>
                </a>
            </div>



        @endforeach
    </div>


    <div class="commits">
        <h1>Lista commitów</h1>

        <table style="border: solid 1px black">
            <tr>
                <th>Commit</th>
                <th>Autor</th>
                <th>Commiter</th>
                <th>Data</th>
            </tr>
            @foreach ($commits as $commit)
                <tr>
                    <td>
                        <h5>{{ $commit['commit']['message'] }}</h5>
                    </td>
                    <td>
                        <h5>{{ $commit['commit']['author']['name'] }}</h5>
                    </td>
                    <td>
                        <h5>{{ $commit['commit']['committer']['name'] }}</h5>
                    </td>
                    <td>
                        <h5>{{ $commit['commit']['committer']['date'] }}</h5>
                    </td>
                </tr>

            @endforeach
        </table>
    </div>
@endsection
