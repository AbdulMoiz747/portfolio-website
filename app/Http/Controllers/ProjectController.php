<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function index()
    {
        $token = env('GITHUB_TOKEN'); // Replace with your GitHub token
        $query = <<<'GRAPHQL'

        query {
            user(login: "AbdulMoiz747") {
                pinnedItems(first: 6, types: REPOSITORY) {
                    nodes {
                        ... on Repository {
                            name
                            description
                            url
                        }
                    }
                }
            }
        }
        GRAPHQL;

        $response = Http::withToken($token)->post('https://api.github.com/graphql', [
            'query' => $query,
        ]);

        if ($response->ok()) {
            $repositories = $response->json()['data']['user']['pinnedItems']['nodes'];
        } else {
            $repositories = [];
        }

        return view('home', ['repositories' => $repositories]);
    }
}
