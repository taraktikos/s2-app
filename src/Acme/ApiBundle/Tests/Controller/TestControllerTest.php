<?php

namespace Acme\BlogBundle\Tests\Controller;

use Acme\ApiBundle\Tests\BaseWebTestCase;
use Acme\BlogBundle\DataFixtures\ORM\LoadPageData;

class TestControllerTest extends BaseWebTestCase
{
    public function testGetPage()
    {
        $this->loadFixture([
                new \Acme\BlogBundle\DataFixtures\ORM\LoadPageData,
            ]);
        $page = array_pop(LoadPageData::$data);

        $route =  $this->container->get('router')->generate('api_1_get_page', ['id' => $page->getId(), '_format' => 'json']);
        $this->client->request('GET', $route);
        $response = $this->client->getResponse();
        $this->assertJsonResponse($response, 200);
        $content = $response->getContent();

        $decoded = json_decode($content, true);
        $this->assertTrue(isset($decoded['id']));
    }
}
