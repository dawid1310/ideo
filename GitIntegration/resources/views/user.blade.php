@extends('layout')

@section('content')
@section('content')



    <div class="user">

        <div class="">
            <a href="/user?login={{ $user['login'] }}">
                <div class="w3-card">
                    <img src={{ $user['avatar_url'] }} style="width:100%">
                    <div class="userdetails">
                        <h4>{{ $user['login'] }}</h4>
                        <h5> <a href="{{ $user['html_url'] }}"> Link do GitHub </a></h5>
                    </div>
                </div>
        </div>
        </a>
    </div>



    <div class="repo">
        <table style="border: solid 1px black">

            <tr>
                <th>Repozytorium</th>
                <th>Link do GitHub</th>

            </tr>


            @foreach ($repos as $item)



                <tr>
                    <td><a href="/repo?name={{ $item['name'] }}&&login={{ $item['owner']['login'] }}">
                            {{ $item['name'] }}
                        </a></td>
                    <td>
                        <a href="{{ $item['html_url'] }}"> {{ $item['full_name'] }}</a>
                    </td>

                </tr>



            @endforeach
        </table>
    </div>
@endsection
