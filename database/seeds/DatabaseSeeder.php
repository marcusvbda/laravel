<?php

use App\Models\{User,Page};
use Illuminate\Database\Seeder;
use marcusvbda\uploader\Models\FileCategory;
use Illuminate\Support\Facades\Storage;
use marcusvbda\uploader\Models\Files as _File;
use marcusvbda\uploader\Controllers\UploaderController as Uploader;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            usersSeed::class,
            pagesSeed::class,
            FilesTableSeeder::class
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

class usersSeed extends Seeder
{
    public function run()
    {
        User::truncate();
        User::create([
          'name' => 'Admin',
          'email' => 'vinicius.bda@icloud.com',
          'password' => bcrypt('v1n1c1u5')
        ]);
    }
}

class pagesSeed extends Seeder
{
    public function run()
    {
        Page::truncate();
        Page::create([
          'name'  =>  "Sobre nós",
          'title' => "Sobre"
        ]);
    }
}


class FilesTableSeeder extends Seeder
{
    public function run()
    {
        FileCategory::truncate();
        Storage::deleteDirectory(config('uploader.upload_path'));
        $category1 = FileCategory::create(["name"=>"Categoria 1"]);
        $category2 = FileCategory::create(["name"=>"Categoria 2"]);
        $file1 = Uploader::upload("https://cdn.auth0.com/blog/logos/laravel.png","image de teste 1","alt da imagem de teste 1");
        $file2 = Uploader::upload("https://www.williamzimmermann.com.br/wp-content/uploads/2018/06/laravel-logo.png","image de teste 2","alt da imagem de teste 2");
        $file3 = Uploader::upload("https://udemy-images.udemy.com/course/750x422/758582_ea1f.jpg","image de teste 3","alt da imagem de teste 3");
        $category1->addFile($file1->id);
        $category1->addFile($file2->id);
        $category2->addFile($file3->id);
    }
}
