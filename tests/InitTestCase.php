<?php

namespace Tests;

class InitTestCase extends TestCase
{
    private static $access_token;

    public function setAccessToken($access_token)
    {
        self::$access_token = $access_token;
    }

    public function getAccessToken()
    {
        return self::$access_token;
    }

    public function getHeaderData()
    {
        $access_token = $this->getAccessToken();
        return [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => "Bearer $access_token"
        ];
    }
}
