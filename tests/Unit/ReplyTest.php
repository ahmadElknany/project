<?php

namespace Tests\Unit;

use Tests\DBTest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends DBTest
{
    /** @test */
    public function it_has_an_owner()
    {
    	$reply = factory('App\Models\Reply')->create();

    	$this->assertInstanceOf('App\User', $reply->owner);
    }
}
