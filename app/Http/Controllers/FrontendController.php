<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\SiteConfig;

class FrontendController extends Controller
{
    public function page($page = null)
    {
        $site = SiteConfig::first();
        if (empty($page)) {
            $page = (object) ['name' => null];

            return view('frontend.'.$site->theme.'.pages.index', compact('page'));
        }
        $page = Page::findBySlug($page);
        if (empty($page)) {
            abort(404);
        }

        return view('frontend.'.$site->theme.'.pages.page', compact('page'));
    }

    public static function write($value, $backup = '')
    {
        return  isset($value) ? $value : $backup;
    }

    public static function menus()
    {
        $site = SiteConfig::first();
        $menu = json_decode($site->menus);
        $menus = [];
        foreach ($menu as $m) {
            $page = Page::find($m->page_id);
            $menus[] = (object) [
                'name' => $m->name,
                'route' => route('frontend.index', ['page' => (isset($page) ? $page->slug : null)]),
            ];
        }

        return $menus;
    }
}
