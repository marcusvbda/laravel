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
        $page = Page::create($page);
        $alert = AlertService::flash('success', '<strong>Pronto!</strong> Página '.$page->name.' foi adicionada com sucesso.');
        return redirect(route('paginas.index'))->with(compact('page'));
    }

    public function show(Request $request,Page $page)
    {
        return view('pages.pages.view', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->all();
        $page->update($data);
        $alert = AlertService::flash('success', '<strong>Pronto!</strong> Página '.$page->name.' foi atualizada com sucesso.');
        return redirect(route('paginas.show',['slug' => $page->slug]));
    }

    public function destroy(Page $page)
    {
        if(!$page) 
        {
            abort(404);
        }
        $page->delete();
        $alert = AlertService::flash('success', '<strong>Pronto!</strong> Página '.$page->name.' foi excluida com sucesso.');
        return redirect(route('paginas.index'));
    }

}
