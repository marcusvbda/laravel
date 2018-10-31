<?php

namespace App\Http\Controllers;

use App\Models\{Page};
use Illuminate\Http\Request;
use App\Http\Requests\CreatePage;
use App\Services\AlertService;

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
            ->orWhere("slug","like","%".$filter["filter"]."%")
            ->orderBy($filter['order_name'], $filter['order_type'])
            ->paginate(5);
        return view('backend.pages.pages.index', compact('pages','filter'));
    }

    public function create()
    {
        return view('backend.pages.pages.create');
    }

    public function store(CreatePage $request)
    {
        $page = $request->all();
        $page = Page::create($page);
        $alert = AlertService::flash('success', '<strong>Pronto!</strong> Página '.$page->name.' foi adicionada com sucesso.');
        return redirect(route('paginas.index'))->with(compact('page'));
    }

    public function show(Request $request,Page $page)
    {
        return view('backend.pages.pages.view', compact('page'));
    }

    public function update(CreatePage $request, Page $page)
    {
        try
        {
            $data = $request->all();
            $page->update($data);
            return response()->json(["success"=>true,"message"=>null,"data"=> $page->slug  ]);
        }
        catch(\Exception $e)
        {
            return response()->json(["success"=>false,"message"=>$e->getMessage(),"data"=>null]);
        }
    }

    public function destroy(Page $page)
    {
        try
        {
            if(!$page) 
            {
                abort(404);
            }
            $page->delete();
            $alert = AlertService::flash('success', '<strong>Pronto!</strong> Página '.$page->name.' foi excluida com sucesso.');
            return response()->json(["success"=>true,"message"=>null,"data"=>  route('paginas.index')  ]);
        }
        catch(\Exception $e)
        {
            return response()->json(["success"=>false,"message"=>$e->getMessage(),"data"=>null]);
        }
    }

}
