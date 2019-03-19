<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Category\Category;
use App\Model\Tiket\Tiket;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Factory(User::class,20)->create();
        //Factory(Category::class,10)->create();
        Factory(Tiket::class,20)->create();
    }
}
