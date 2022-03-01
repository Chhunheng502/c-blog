<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_requires_a_name()
    {
        // $this->withoutExceptionHandling();

        $attributes = User::factory()->raw(['name' => '']);

        $this->post('/register', $attributes)
            ->assertSessionHasErrors('name');
    }

    // /** @test */
    // public function a_user_requires_a_profile_picture()
    // {
    //     // $this->withoutExceptionHandling();

    //     $attributes = User::factory()->raw(['profile_picture' => '']);

    //     $this->post('/register', $attributes)
    //         ->assertSessionHasErrors('profile_picture');
    // }

    /** @test */
    public function a_user_requires_an_email()
    {
        // $this->withoutExceptionHandling();

        $attributes = User::factory()->raw(['email' => '']);

        $this->post('/register', $attributes)
            ->assertSessionHasErrors('email');
    }


            /** @test */
    public function a_user_requires_a_password()
    {
        // $this->withoutExceptionHandling();

        $attributes = User::factory()->raw(['password' => '']);

        $this->post('/register', $attributes)
            ->assertSessionHasErrors('password');
    }
}
