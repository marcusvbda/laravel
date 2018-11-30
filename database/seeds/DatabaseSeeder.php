<?php

use App\Models\User;
use App\Models\Page;
use App\Models\SiteConfig;
use Illuminate\Database\Seeder;
use marcusvbda\uploader\Models\FileCategory;
use Illuminate\Support\Facades\Storage;
use marcusvbda\uploader\Models\File as _File;
use marcusvbda\uploader\Controllers\UploaderController as Uploader;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            RolesTableSeeder::class,
            usersSeed::class,
            pagesSeed::class,
            // FilesTableSeeder::class,
            SiteConfigSeeder::class,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

class SiteConfigSeeder extends Seeder
{
    public function run()
    {
        SiteConfig::truncate();
        SiteConfig::create([
          'title' => 'Nome do site',
        ]);
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
          'password' => bcrypt('v1n1c1u5'),
        ])->assignRole(1);
    }
}

class pagesSeed extends Seeder
{
    public function run()
    {
        Page::truncate();
        Page::create([
          'name' => 'Sobre',
          'title' => 'Sobre',
          'content' => '...Sobre nosso site',
        ]);
    }
}

class FilesTableSeeder extends Seeder
{
    public function run()
    {
        FileCategory::truncate();
        _File::truncate();
        DB::table('_files_categories_relation')->truncate();
        DB::table('_files_relation')->truncate();
        Storage::deleteDirectory(config('uploader.upload_path'));
        $category1 = FileCategory::create(['name' => 'Categoria 1']);
        $category2 = FileCategory::create(['name' => 'Categoria 2']);
        $file1 = Uploader::upload('https://cdn.auth0.com/blog/logos/laravel.png', 'image de teste 1', 'alt da imagem de teste 1');
        $file2 = Uploader::upload('https://www.williamzimmermann.com.br/wp-content/uploads/2018/06/laravel-logo.png', 'image de teste 2', 'alt da imagem de teste 2');
        $file3 = Uploader::upload('https://udemy-images.udemy.com/course/750x422/758582_ea1f.jpg', 'image de teste 3', 'alt da imagem de teste 3');
        $category1->addFile($file1);
        $category1->addFile($file2);
        $category2->addFile($file3);
        Uploader::makeThumbnail($file1);
        Uploader::makeThumbnail($file2);
        Uploader::makeThumbnail($file3);
    }
}

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::truncate();
        Role::create(['name' => 'admin']);
    }
}
