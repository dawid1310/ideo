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
    }


    public function showRepo()
    {
        $repo = $_GET['name'];
        $gitRequest = new GitRequest();
    }
}
