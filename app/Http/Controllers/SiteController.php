<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{SiteConfig,Page};
use App\Http\Requests\CreateSiteConfig;
use App\Services\AlertService;


class SiteController extends Controller
{
    public function index()
    {
        $site = SiteConfig::first();
        $pages = Page::where("status","A")->get();
        return view('backend.pages.site.index',compact('site','pages'));
    }

    public function edit(CreateSiteConfig $request, SiteConfig $site)
    {
        try
        {
            $data = $request->all();
            $data["menus"]=json_encode($data["menus"]);
            $site->update($data);
            return response()->json(["success"=>true,"message"=>null,"data"=> $data  ]);
        }
        catch(\Exception $e)
        {
            return response()->json(["success"=>false,"message"=>$e->getMessage(),"data"=>null]);
        }
    }

    public static function get()
    {
        return SiteConfig::first();
    }


}
