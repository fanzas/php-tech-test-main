<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->posts()->paginate(5);

        return JsonResource::collection($posts);
    }
}