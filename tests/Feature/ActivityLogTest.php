<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityLogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_activitylog()
    {
        $response = $this->get('/activitylog');

        $response->assertStatus(302);
    }
}

\