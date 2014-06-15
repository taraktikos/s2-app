<?php

namespace Acme\ApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\Common\DataFixtures\Loader,
    Doctrine\Common\DataFixtures\Executor\ORMExecutor,
    Doctrine\Common\DataFixtures\Purger\ORMPurger;

class BaseWebTestCase extends WebTestCase
{
    public $client;
    public $em;
    public $container;

    public function setUp() {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->container = static::$kernel->getContainer();
        $this->client = static::createClient();
    }

    public function loadFixture(array $fixtures) {
        if (count($fixtures)) {
            $loader = new Loader();
            foreach ($fixtures as $fixture) {
                $loader->addFixture($fixture);
            }
            $purger = new ORMPurger();
            $executor = new ORMExecutor($this->em, $purger);
            $executor->execute($loader->getFixtures());
        }
    }

    protected function assertJsonResponse($response, $statusCode = 200) {
        $this->assertEquals(
            $statusCode, $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }
}
