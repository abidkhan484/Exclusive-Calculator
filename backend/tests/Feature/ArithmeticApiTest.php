<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArithmeticApiTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * get_all_operators API testing
     *
     * @return void
     */
    public function test_get_all_operators_for_arithmetic_operations()
    {
        $response = $this->get('/api/get-all-operators');

        $response->assertStatus(200);
    }
    /**
     * check arithmetic operation API testing.
     *
     * @return void
     */
    public function test_check_arithmetic_operations()
    {
        $response = $this->post('/api/check-arithmetic-operation', [
            'number1' => 3,
            'number2' => 2,
            'emoji_code' => 'U+1F47D'
        ]);

        $response->assertStatus(200);
    }
}
