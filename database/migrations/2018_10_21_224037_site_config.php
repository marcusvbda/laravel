<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiteConfig extends Migration
{
    public function up()
    {
        Schema::create('site_config', function (Blueprint $table) 
        {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->string('title');
            $table->string('menus')->default("[]");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('site_config');
    }
}
