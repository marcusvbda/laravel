<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index($page = null)
    {
        return view('backend.pages.posts.index');
    }

}
