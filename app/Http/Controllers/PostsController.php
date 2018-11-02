<?php

namespace App\Http\Controllers;

use App\Models\{Post,Category};
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
    	$data = $request->all();
        $filter = (isset($data["filter"]) ? $data["filter"] : "");

        $posts = Post::where("name","like","%$filter%")
            ->orWhere("slug","like","%$filter%")
            ->paginate(10);
        return view('backend.pages.posts.index',compact('posts','filter'));
    }

    public function create()
    {
    	$categories = Category::with('subCategories')->get();
        return view('backend.pages.posts.create',compact('categories'));
    }

}
