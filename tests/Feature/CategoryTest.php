<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function author_or_admin_can_view_all_categories()
    {
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function admin_can_create_category()
    {
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function admin_can_edit_category()
    {
        $this->withoutExceptionHandling();
    }

            /** @test */
    public function admin_can_delete_category()
    {
        $this->withoutExceptionHandling();
    }
}
