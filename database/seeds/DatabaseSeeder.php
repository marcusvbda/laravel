<?php

use App\Models\{User,Page};
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            usersSeed::class,
            pagesSeed::class
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
        $name = "Sobre nós";
        Page::create([
          'name' => $name
        ]);
    }
}