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
        }
    }

    public function show($type, $name)
    {
        if($type == 'user'){
            $query = $this->addres . 'users/' . $name;
        }
        else{
            $query = $this->addres . 'repos/' . $name;
        }
        
    }
}
