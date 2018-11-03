<?php

namespace App\Http\Controllers;

use App\Models\{Post,Category};
use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;
use App\Services\AlertService;


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

    public function store(CreatePost $request)
    {
        try
        {
            $data = $request->all();
            $post = Post::create($data);
            foreach($data["categories"]["selected"] as $category)
            {
                $post->addCategory($category, ( $category == $data["categories"]["primary"] ) );
            }
            AlertService::flash('success', '<strong>Pronto!</strong> Post '.$post->name.' foi adicionada com sucesso.');
            return response()->json(["success"=>true,"message"=>null,"data"=> route('posts.index') ]);
        }
        catch(\Exception $e)
        {
            return response()->json(["success"=>false,"message"=>$e->getMessage(),"data"=>null]);
        }
    }


}
