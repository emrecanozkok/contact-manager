<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HeartBeat extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_application_heartbeat()
    {
        $response = $this->get('/heartbeat');

        $response->assertStatus(200);
    }
}
