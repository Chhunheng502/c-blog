<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_register()
    {
        $this->withoutExceptionHandling();

        $this->get('/register')
            ->assertSuccessful();

        $attributes = User::factory()->raw([
            'password' => $this->faker()->password($min = 5, $max = 15),
            'profile_picture' => $this->faker()->image(),
        ]);

        $this->post('/register', $attributes)
            ->assertSuccessful();

        $this->assertDatabaseHas('users', $attributes);
    }

    /** @test */
    public function a_user_can_login()
    {
        $this->withoutExceptionHandling();

        $this->get('/login')
            ->assertSuccessful();

        $user = User::factory()->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ])
        ->assertRedirect(route('posts.index'));

        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function a_user_can_view_all_posts()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('posts.index'))
            ->assertSuccessful();
    }

    /** @test */
    public function a_user_can_view_a_post()
    {
        $this->withoutExceptionHandling();

        // $this->withoutMiddleware();

        $post = Post::factory()->create();

        $this->get(route('posts.show', $post->id))
            ->assertSee($post->title)
            ->assertSee($post->content);
    }

    /** @test */
    public function a_user_can_comment()
    {
        $this->withoutExceptionHandling();

        // $this->withoutMiddleware();

        $user = User::factory()->create();

        $post = Post::factory()->create();

        $this->actingAs($user)
            ->post(route('posts.comment', $post->id), [
                'comment_content' => $this->faker()->sentence(),
            ])
            ->assertSuccessful();
    }
}
