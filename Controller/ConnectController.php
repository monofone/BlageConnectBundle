<?php

namespace Blage\ConnectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ConnectController extends Controller
{
    /**
     * @Template()
     */
    public function ownSensioBadgeAction()
    {
        $sensio = $this->get('blage_connect.sensio');
        /* @var Blage\ConnectBundle\Service\SensioConnectService */
        $badges = $sensio->fetchBadges();
        
        
        return $this->render('BlageConnectBundle:Connect:badges.html.twig',array('badges' => $badges));
    }
    
    public function ownSensioProfileAction()
    {
        $sensio = $this->get('blage_connect.sensio');
        /* @var Blage\ConnectBundle\Service\SensioConnectService */
        $profile = $sensio->getProfile();
        
        
        return $this->render('BlageConnectBundle:Connect:profile.html.twig',array('profile' => $profile));
    }
}
