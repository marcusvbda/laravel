<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModelCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_categories', function (Blueprint $table) 
        {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';  
            $table->morphs("model");
            $table->boolean('primary')->default(false);
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade'); 
            $table->timestamps();                
            $table->primary(['model_type', 'model_id', 'category_id']);    
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_categories');
    }
}
