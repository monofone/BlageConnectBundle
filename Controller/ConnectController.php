<?php

namespace Blage\ConnectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ConnectController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function ownSensioBadgeAction($name = '')
    {
        $sensio = $this->get('blage_connect.sensio');
        /* @var Blage\ConnectBundle\Service\SensioConnectService */
        $badges = $sensio->fetchBadges();
        
        
        return $this->render('BlageConnectBundle:Connect:badges.html.twig',array('badges' => $badges));
    }
}
