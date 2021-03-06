<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewABlogPostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group view-post
     */
    public function testCanViewABlogPost()
    {
        // Arrangement
        // creating a blog post
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simple body'
        ]);
        // Action
        // visiting a route
        $resp = $this->get("/posts/{$post->id}");
        // Assert
        // assert status code 200
        $resp->assertStatus(200);
        // assert that we see post title
        $resp->assertSee($post->title);
        // assert that we see post body
        $resp->assertSee($post->body);
        // assert that we see published date
        $resp->assertSee($post->created_at->toFormattedDateString());

    }

    /**
     * @group post-not-found
     *
     */

    public function testViewA404PageWhenPostIsNotFound()
    {
        // action
        $resp = $this->get("/posts/INVALID_ID");
        // assert
        $resp->assertStatus(404);
        $resp->assertSee('The page you are looking for could not be found');

    }

    /**
     * @group formatted-date
     */
    public function testCaGetCreatedAtFormattedDate()
    {
        // arrange
        // create a post
        $post = Post::create([
            'title' => 'A simple title',
            'body' => 'A simple body'
        ]);
        // act
        // get the value by calling the method
        $formattedDate = $post->createdAt();
        // assert
        // assert that value returned is as we expected
        $this->assertEquals($post->created_at->toFormattedDateString(), $formattedDate);
    }
}
