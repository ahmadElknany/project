<?php

namespace Tests\Feature;

use Tests\DBTest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends DBTest
{
    /** @test */
    public function a_user_can_add_thread()
    {
    	$this->actingAs(factory('App\User')->create());
    	$thread = factory('App\Models\Thread')->make();

    	$this->post('threads', $thread->toArray());

    	$response = $this->get($thread->path());
    	
    	$response->assertSee($thread->title)
    		->assertSee($thread->body);
    }
}
