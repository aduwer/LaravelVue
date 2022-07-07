<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use WithFaker;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->json('POST', route('user.register'), [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'password' => $this->faker->password,
            'email' => $this->faker->email
        ]);
        $response->assertStatus(200);
    }
}
