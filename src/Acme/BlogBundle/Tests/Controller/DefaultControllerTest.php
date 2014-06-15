<?php

namespace Acme\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Test');

        $this->assertTrue($crawler->filter('html:contains("Hello Test")')->count() > 0);
    }
}
