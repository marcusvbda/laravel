<?php

namespace App\Http\Controllers;

use App\Models\{Category};
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategory;


class CategoriesController extends Controller
{

    public function store(CreateCategory $request)
    {
        try
        {
            $data = $request->all();
            Category::create($data);
            $categories = Category::OnlyParent()->with('subCategories')->get();
            return response()->json(["success"=>true,"message"=>null,"data"=> $categories ]);
        }
        catch(\Exception $e)
        {
            return response()->json(["success"=>false,"message"=>$e->getMessage(),"data"=>null]);
        }
    }

}
