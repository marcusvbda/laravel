<?php

namespace App\Http\Controllers;

use App\Models\{Page,SiteConfig};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($page = null)
    {
        $pages = Page::where("status",false)->get();
        return view('backend.pages.dashboard.index',compact('pages'));
    }

}
