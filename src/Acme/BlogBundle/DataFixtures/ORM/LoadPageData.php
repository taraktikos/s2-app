<?php

namespace Acme\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\BlogBundle\Entity\Page;

class LoadPageData extends AbstractFixture implements OrderedFixtureInterface
{

    public static $data = [];
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $page1 = new Page();
        $page1->setTitle('Title page 1');
        $page1->setBody('Body page 1');

        $manager->persist($page1);
        $manager->flush();
        $this->addReference('page1', $page1);
        self::$data[] = $page1;
    }

    public function getOrder() {
        return 1;
    }
}