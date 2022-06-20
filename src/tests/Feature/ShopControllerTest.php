<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShopControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('shop.index'));

        $response->assertStatus(200)
            ->assertViewIs('shop.index');
    }
}
