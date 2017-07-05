<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon;

class PostTest extends TestCase {

    use DatabaseMigrations;

    public function testPostCanBeCreated() {
        $user = factory(\App\User::class)->create();
        $post = $user->post()->create([
            'title' => 'The post Insert',
            'body' => 'The post body',
            'active' => '1',
            'published_at' => Carbon\Carbon::now(),
        ]);
        $this->assertDatabaseHas('posts', ['title' => 'The post Insert']);
    }

    public function testPostCanBeDeleted() {
        $user = factory(\App\User::class)->create();
        $post = $user->post()->create([
            'title' => 'The post Insert',
            'body' => 'The post body',
            'active' => '1',
            'published_at' => Carbon\Carbon::now(),
        ]);
        $post->delete();
        $this->assertDatabaseMissing('posts', ['title' => 'The post Insert']);
    }

}
