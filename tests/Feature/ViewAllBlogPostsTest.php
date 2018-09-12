<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewAllBlogPostsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group posts
     */
    public function testCanViewAllBlogPosts()
    {
        // arrange
        $post1 = factory(Post::class)->create();

        $post2 = factory(Post::class)->create();

        // act

        $resp = $this->get('/posts');

        // assert

        $resp->assertStatus(200);
        $resp->assertSee($post1->title);
        $resp->assertSee($post2->title);
        $resp->assertSee(str_limit($post1->body));
        $resp->assertSee(str_limit($post2->body));
    }
}
