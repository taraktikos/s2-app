<?php

namespace Acme\BlogBundle\Controller;

use Acme\BlogBundle\Entity\Page;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TestController extends FOSRestController
{
    public function getPageAction($id)
    {
        return $this->getDoctrine()->getRepository('Acme\BlogBundle\Entity\Page')->find($id);
    }
}
