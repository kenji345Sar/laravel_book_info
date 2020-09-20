<?php

namespace Tests\Feature;

use App\Models\Review;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $review = factory(Review::class)->create();

        $result = $review->isLikedBy(null);

        $this->assertFalse($result);
    }

    public function testIsLikedByTheUser()
    {
        $review = factory(Review::class)->create();
        $user = factory(User::class)->create();
        $review->likes()->attach($user);

        $result = $review->isLikedBy($user);

        $this->assertTrue($result);
    }

    public function testIsLikedByAnother()
    {
        $review = factory(Review::class)->create();
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $review->likes()->attach($another);

        $result = $review->isLikedBy($user);

        $this->assertFalse($result);
    }

}
