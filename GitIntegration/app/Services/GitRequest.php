<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitRequest
{
    private $addres = "https://api.github.com/";
    public $response;

    public function search($search_type, $serched, $args = null)
    {
        $query = $this->addres . 'search/' . $search_type . '?q=' . $serched;
        if ($args) {
            if ($args['sort_by'])
                $query = $query . '&sort=' . $args['sort_by'];
            if ($args['order'])
                $query = $query . '&order=' . $args['order'];
            if ($args['reults_on_page'])
                $query = $query . '&per_page=' . $args['reults_on_page'];
            if ($args['no_page'])
                $query = $query . '&page=' . $args['no_page'];
        }
        $response = Http::get($query);
        if ($response->json()) {
            if (count($response->json()['items']) > 0) {
                $this->response = $response->json()['items'];
                return true;
            }
        }
        return false;
    }

    public function show($user, $repo = null)
    {
        if (!$repo) {
            $query = $this->addres . 'users/' . $user;
            if (Http::get($query . '/repos')->json())
                $this->response = Http::get($query . '/repos')->json();
            else
                $this->response[0]['owner'] = Http::get($query)->json();
            return true;
        } else {
            $query = $this->addres . 'repos/' . $user . '/' . $repo;
            $this->response['repo'] = Http::get($query)->json();
            $this->response['contributors'] = Http::get($query . '/contributors')->json();
            $this->response['commits'] = Http::get($query . '/commits')->json();
            return true;
        }

        return false;
    }
}
