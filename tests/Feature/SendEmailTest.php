<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\InitTestCase;
use Tests\InitTestCaseInterface;

class SendEmailTest extends InitTestCase 
{
    private $base_url = 'api/admin/send-email';

    

    public function testSendEmail()
    {
        $this->json('GET', $this->base_url, [], $this->getHeaderData())
        ->assertStatus(200)
        ->assertJson([
            "success" => "Email send successfully"
        ]);
    }

    

}
