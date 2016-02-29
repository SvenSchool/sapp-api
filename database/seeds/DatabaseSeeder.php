<?php

use Illuminate\Database\Seeder;
use App\{Group, Board, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Type::class, 3)->create();
        factory(App\Group::class, 10)->create();
        factory(App\User::class, 20)->create();
    }
}
