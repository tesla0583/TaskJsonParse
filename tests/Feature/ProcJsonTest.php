<?php

namespace Tests\Feature;

use App\Models\Json;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcJsonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testJsonsPagesStatus()
    {
        $response = $this->get('/json');

        $response->assertStatus(200);

        $response = $this->get('/json/1/edit');

        $response->assertStatus(200);

    }
}
