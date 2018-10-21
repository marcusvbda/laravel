<?php

namespace App\Http\Controllers;

use App\Models\{Page};
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function page($page = null)
    {
        if( empty($page) )
        {
            return view('frontend.pages.index');
        }
        $page = Page::findBySlug($page);
        if(empty($page))
        {
            abort(404);
        }
        return view('frontend.pages.page',compact('page'));
    }


}
