<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\User::class, 20)->create()->each(function($u) {
            $u->post()->save(factory(App\Post::class)->make());
        });
    }

}
