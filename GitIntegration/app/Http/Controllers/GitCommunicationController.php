<?php

namespace App\Http\Controllers;

use App\Services\GitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitCommunicationController extends Controller
{

    public function search()
    {
        $search_type = $_GET['search_type'];
        $serched = $_GET['searched'];
        if ($search_type == 'users')
            $name = 'login';
        else
            $name = 'name';
        $gitRequest = new GitRequest();
        $gitRequest->search($search_type, $serched);
        //dd($gitRequest->response);
        return view('results', ['response' => $gitRequest->response, 'search_type' => $search_type, 'name' => $name]);
    }


    public function showUser()
    {
        $user = $_GET['login'];
        $gitRequest = new GitRequest();
        $gitRequest->show($user);
        //dd($gitRequest->response);
        return view('user', ['user' => $gitRequest->response[0]['owner'], 'repos' => $gitRequest->response]);
    }


    public function showRepo()
    {

        $repo = $_GET['name'];
        $user = $_GET['login'];
        $gitRequest = new GitRequest();
        $gitRequest->show($user, $repo);
        ///dd($gitRequest->response['repo']);
        return view('repo', ['repo' => $gitRequest->response['repo'], 'contributors' => $gitRequest->response['contributors'], 'commits' => $gitRequest->response['commits']]);
    }
}
