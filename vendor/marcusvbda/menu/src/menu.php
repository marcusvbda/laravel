<?php

namespace marcusvbda\menu;
use Request;

class Menu 
{
    public static function active($menu,$class="active")
    {
        return  ( explode(".",Request::route()->getName() )[0] == $menu ? $class : "");
    }
}
