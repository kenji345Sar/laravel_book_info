<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Review;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testGuestShow()
    {
        $user = factory(User::class)->create();
        factory(Review::class)->create(['user_id' => $user->id]);
        $response = $this->get("/reviews/{$user->id}");
        $response->assertStatus(200);

    }

    public function testAuthShow()
    {
        $user = factory(User::class)->create();
        factory(Review::class)->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->get("/reviews/{$user->id}");
        $response->assertStatus(200);

        $response->assertSeeText("変更&削除");
    }


    public function testIndex()
    {
        $response = $this->get(route('reviews.index'));

        $response->assertStatus(200)
            ->assertViewIs('reviews.index');
    }


    public function testGuestCreate()
    {
        $response = $this->get(route('reviews.create'));

        $response->assertRedirect(route('login'));
    }

    public function testAuthCreate()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('reviews.create'));

        $response->assertStatus(200)
            ->assertViewIs('reviews.create');
    }





}
