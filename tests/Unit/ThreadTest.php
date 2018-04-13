<?php

namespace Tests\Unit;

use Tests\DBTest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends DBTest
{

    public function setUp()
    {
        parent::setUp();
        $this->thread = factory('App\Models\Thread')->create();
    }
    /** @test */
    public function a_thread_has_replies()
    {

    	$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /** @test */
    public function a_thread_has_creator()
    {
        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    /** @test */
    public function a_thread_can_add_reply()
    {
    	$this->thread->addReply([
            'body' => 'HH',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
