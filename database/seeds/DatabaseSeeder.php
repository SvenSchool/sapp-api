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
        factory(User::class, 10)->create()->each(function($user) {
            $user->group()->save( factory(Group::class)->make() );
        });

        $this->createRoles();
    }

    protected function createRoles()
    {
        Bouncer::allow('admin')->to('create', Group::class);
        Bouncer::allow('admin')->to('edit', Group::class);
        Bouncer::allow('admin')->to('delete', Group::class);

        Bouncer::allow('admin')->to('create', User::class);
        Bouncer::allow('admin')->to('edit', User::class);
        Bouncer::allow('admin')->to('delete', User::class);

        Bouncer::allow('admin')->to('create', Board::class);
        Bouncer::allow('admin')->to('edit', Board::class);
        Bouncer::allow('admin')->to('delete', Board::class);
    }
}
