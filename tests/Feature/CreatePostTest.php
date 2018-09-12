<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group create-post
     */
    public function testCanCreatePost()
    {
        // arrange


        // act
        $resp = $this->post('/posts', [
            'title' => 'new post title',
            'body' => 'new post body'
        ]);

        // assert
        $this->assertDatabaseHas('posts', [
            'title' => 'new post title',
            'body' => 'new post body'
        ]);
        $post = Post::find(1);
        $this->assertEquals('new post title', $post->title);
        $this->assertEquals('new post body', $post->body);
    }

    /**
     * @group title-required
     */
    public function testTitleIsRequiredToCreatePost()
    {
        // arrange

        // act
        $resp = $this->post('/posts', [
            'title' => null,
            'body' => 'new post body'
        ]);


        // assert
        $resp->assertSessionHasErrors('title');
    }

    /**
     * @group body-required
     */
    public function testBodyIsRequiredToCreatePost()
    {
        // arrange

        // act
        $resp = $this->post('/posts', [
            'title' => 'new post title',
            'body' => null
        ]);


        // assert
        $resp->assertSessionHasErrors('body');
    }
}
