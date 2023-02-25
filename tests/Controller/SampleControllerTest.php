<?php

namespace YesCorpo\Bundle\SampleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SampleControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/sample');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        
        $json = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('message', $json);
        $this->assertArrayHasKey('path', $json);
        $this->assertEquals('Welcome to your new controller!', $json['message']);
        $this->assertEquals('src/Controller/SampleController.php', $json['path']);
    }
}