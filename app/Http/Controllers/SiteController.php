<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{SiteConfig};
use App\Http\Requests\CreateSiteConfig;
use App\Services\AlertService;


class SiteController extends Controller
{
    public function index()
    {
        $site = SiteConfig::first();
        return view('backend.pages.site.index',compact('site'));
    }

    public function edit(CreateSiteConfig $request,SiteConfig $site)
    {
        $data = $request->all();
        $site->update($data);
        $alert = AlertService::flash('success', '<strong>Pronto!</strong> Site atualizado com sucesso.');
        return redirect(route('site.index'));
    }

    public static function get()
    {
        return SiteConfig::first();
    }


}
