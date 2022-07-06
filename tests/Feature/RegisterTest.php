<?php

namespace Tests\Feature;

use Faker\Generator;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    /**
     * @var Generator
     */
    private $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = $this->app->make(Generator::class);
    }
//
//    public function testRegisterOK()
//    {
//        $email = $this->faker->email;
//
//        $response = $this->json('POST', route('user.register'), [
//            'name' => $this->faker->name,
//            'surname' => $this->faker->lastName,
//            'password' => $this->faker->password,
//            'email' => $email
//        ]);
//
//        $response->assertStatus(200);
//
//        self::assertDatabaseHas('user', [
//            'email' => $email
//        ]);
//
//    }

    public function testRegisterEmailRequired()
    {
        $response = $this->json('POST', route('user.register'), [
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'password' => $this->faker->password,
        ]);

        $response->assertStatus(422);

        dd($response->json());
    }
}
