<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @group create-post
     */
    public function testAuthUserCanCreatePost()
    {

        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->LoginAs($user)
                ->visit('/posts/create')
                ->type('title', 'New Post')
                ->type('body', 'New Body')
                ->press('Save Post')
                ->assertPathIs('/posts')
                ->assertSee('New Post')
                ->assertSee('New Body');
        });
    }
}
