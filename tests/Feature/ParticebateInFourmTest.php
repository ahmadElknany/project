<?php

namespace Tests\Feature;

use Tests\DBTest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticebateInFourmTest extends DBTest
{
    /** @test */
    public function an_authenticated_user_may_particebate_in_fourm_thread()
    {
        $this->be($user = factory('App\User')->create());
        $thread = factory('App\Models\Thread')->create();
        // Why Make .. Not Create?
        // Create Will Add New Record In The DataBase .. 
        // Make will a reply in memory and then pass it to the post data as array
        $reply  = factory('App\Models\Reply')->make();

        $this->post('threads/'.$thread->id.'/replies', $reply->toArray());

        $this->get('threads/'.$thread->id)
        	->assertSee($reply->body);

    }
}
