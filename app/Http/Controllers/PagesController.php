<?php

namespace App\Http\Controllers;

use App\Models\{Page};
use Illuminate\Http\Request;
use App\Http\Requests\CreatePage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $filter = [
            "filter"     =>  ( isset($data["filter"]) ? $data["filter"] : "" ) ,
            "order_type" =>  ( isset($data["order_type"]) ? $data["order_type"] : "DESC" ) ,
            "order_name" =>  ( isset($data["order_name"]) ? $data["order_name"] : "id" )
        ];
        $pages = Page::where("name","like","%".$filter["filter"]."%")
            ->where("slug","like","%".$filter["filter"]."%")
            ->orderBy($filter['order_name'], $filter['order_type'])
            ->paginate(5);
        return view('pages.pages.index', compact('pages','filter'));
    }

    public function create()
    {
        return view('pages.pages.create');
    }

    public function store(CreatePage $request)
    {
        $page = $request->all();
        $page["slug"] = SlugService::createSlug(Page::class, 'slug', $page['name']);
        $page = Page::create($page);
        $added = true;
        return redirect(route('paginas.index'))->with(compact('added','page'));
    }

    public function show(Request $request,Page $page)
    {
        return view('pages.pages.view', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->all();
        $data["slug"] = SlugService::createSlug(Page::class, 'slug', $data['name']);
        $updated = $page->update($data);
        return redirect(route('paginas.show',['slug' => $page->slug]))->with(compact('updated','page'));
    }

    public function destroy(Page $page)
    {
        if(!$page) 
        {
            abort(404);
        }
        $deleted = $page->delete();
        return redirect(route('paginas.index'))->with(compact('deleted','page'));
    }

}
