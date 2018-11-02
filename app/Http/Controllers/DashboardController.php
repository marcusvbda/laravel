<?php

namespace App\Http\Controllers;

use App\Models\{Page,SiteConfig,Post};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($page = null)
    {
        $pagesCount = Page::where("status","A")->count();
        $postsCount = Post::where("status","A")->count();
        return view('backend.pages.dashboard.index',compact('pagesCount','postsCount'));
    }

}
