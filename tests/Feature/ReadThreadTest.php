<?php

namespace Tests\Feature;

use Tests\DBTest;


class ReadThreadTest extends DBTest
{

    public function setUp()
    {
    	parent::setUp();
        $this->thread = factory('App\Models\Thread')->create();
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {

        $this->get('threads')
			->assertSee($this->thread->title);

    }
    /** @test */
    public function a_user_can_view_single_thread()
    {

        $this->get('threads/'.$this->thread->id)
        	->assertSee($this->thread->title);

    }
	/** @test */
    public function a_user_can_see_replies_on_thread()
    {
        $reply = factory('App\Models\Reply')
        	->create(['thread_id' => $this->thread->id]);

        $this->get('threads/'.$this->thread->id)
        	->assertSee($reply->body);

    }
}