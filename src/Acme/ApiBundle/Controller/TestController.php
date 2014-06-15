<?php

namespace Acme\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class TestController extends FOSRestController
{

    /**
     * Get a Page
     *
     * **Response Format**
     *
     *      {
     *          "id":1,
     *          "title":"Title page 1",
     *          "body":"Body page 1"
     *      }
     *
     * @ApiDoc(
     *     section="Pages",
     *     resource=true,
     *     statusCodes={
     *         200="OK"
     *     }
     * )
     */
    public function getPageAction($id)
    {
        return $this->getDoctrine()->getRepository('Acme\BlogBundle\Entity\Page')->find($id);
    }
}
