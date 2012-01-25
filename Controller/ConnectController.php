<?php

namespace Blage\ConnectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ConnectController extends Controller
{
    public function ownSensioBadgeAction()
    {
        if($this->container->has('blage_connect.cache')) {
            $badges = $this->get('blage_connect.cache')->fetchBadges();
        }else{
            $badges = $this->get('blage_connect.sensio')->fetchBadges();
        }

        return $this->render('BlageConnectBundle:Connect:badges.html.twig',array('badges' => $badges));
    }
    
    public function ownSensioProfileAction()
    {
        if($this->container->has('blage_connect.cache')) {
            $profile = $this->get('blage_connect.cache')->fetchProfile();
        }else{
            $profile = $this->get('blage_connect.sensio')->getProfile();
        }

        return $this->render('BlageConnectBundle:Connect:profile.html.twig',array('profile' => $profile));
    }
}
