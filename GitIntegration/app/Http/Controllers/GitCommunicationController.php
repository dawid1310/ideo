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
        $args = null;
        $sort_by = $_GET['sort_by'];
        $order = $_GET['order'];
        $reults_on_page = $_GET['reults_on_page'];
        $no_page = $_GET['no_page'];
        if ($sort_by || $order || $reults_on_page || $no_page) {
            $args = [
                'sort_by' => $sort_by,
                'order' => $order,
                'reults_on_page' => $reults_on_page,
                'no_page' => $no_page
            ];
        }
        if ($search_type == 'users')
            $name = 'login';
        else
            $name = 'name';
        $gitRequest = new GitRequest();
        if ($gitRequest->search($search_type, $serched, $args))
            return view('results', ['response' => $gitRequest->response, 'search_type' => $search_type, 'name' => $name]);
        else
            return redirect('/');
    }


    public function showUser()
    {
        $user = $_GET['login'];
        $gitRequest = new GitRequest();
        $gitRequest->show($user);
        return view('user', ['user' => $gitRequest->response[0]['owner'], 'repos' => $gitRequest->response]);
    }


    public function showRepo()
    {

        $repo = $_GET['name'];
        $user = $_GET['login'];
        $gitRequest = new GitRequest();
        $gitRequest->show($user, $repo);
        return view('repo', ['repo' => $gitRequest->response['repo'], 'contributors' => $gitRequest->response['contributors'], 'commits' => $gitRequest->response['commits']]);
    }
}
