<?php

namespace Tests\Feature;

use Tests\InitTestCase;

class AuthenticationTest extends InitTestCase
{
    private $base_url = 'api/login';

    public function testMustEnterEmail()
    {
        $this->json('POST', $this->base_url)->assertStatus(400)->assertJson([
            "error" => "The email field is required."
        ]);
    }

    public function testSuccessfulLogin()
    {
        $loginData = ['email' => 'admin@schoole.com', 'password' => '123456'];

        $res = $this->json('POST', $this->base_url, $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'role',
                "access_token"
            ]);
        $this->setAccessToken($res['access_token']);
    }
}
