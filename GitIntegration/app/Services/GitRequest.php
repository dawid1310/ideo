<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitRequest
{
    private $addres = "https://api.github.com/";
    public $response;
    private $postfix = [
        'repositories' => '+in:name',
        'users' => '+in:users'
    ];
    public function search($search_type, $serched)
    {
        $query = $this->addres . 'search/' . $search_type . '?q=' . $serched . $this->postfix[$search_type];
        $response = Http::get($query);
        if ($response->json()) {
            $this->response = $response->json()['items'];
            return true;
        }
        return false;
    }

    public function show($user, $repo = null)
    {
        if(!$repo){
            $query = $this->addres . 'users/' . $user;
            if(Http::get($query .'/repos')->json())
                $this->response = Http::get($query .'/repos')->json();
            else
                $this->response[0]['owner'] = Http::get($query)->json();
            return true;
        }
        else{
            $query = $this->addres . 'repos/' . $user . '/' . $repo;
            $this->response['repo'] = Http::get($query)->json();
            $this->response['contributors'] = Http::get($query . '/contributors')->json();
            $this->response['commits'] = Http::get($query . '/commits')->json();
            return true;
        }
        
        return false;
    }
}
