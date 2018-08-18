<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('/results', ['search' => 'Wal', 'near_the_beach' => 1, 'accepts_pets' => 1]);
        $response->assertSeeText('card');
        $response->assertViewHas('properties');
        $response->assertOk();
    }
}
