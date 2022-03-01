<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function author_can_create_post()
    {
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function author_can_edit_post()
    {
        $this->withoutExceptionHandling();
    }

            /** @test */
    public function author_can_delete_post()
    {
        $this->withoutExceptionHandling();
    }
}
