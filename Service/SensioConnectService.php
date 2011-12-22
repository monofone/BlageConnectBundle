<?php

namespace Blage\ConnectBundle\Service;

/**
 * Connects to the Sensio Profile JSON Api
 * returns Profile, Badges and Clubs
 *
 * @author srohweder
 */
class SensioConnectService
{
    protected $profileUrl;
    protected $profileName;
    /**
     *
     * @var Profile
     */
    protected $profile;
    
    
    public function __construct($profileUrl, $profileName)
    {
        $this->profileUrl = $profileUrl;
        $this->profileName = $profileName;
        $this->loadData();
    }
            
    /**
     *
     * @return Badge[]
     */
    public function fetchBadges()
    {
        return $this->profile->getBadges();
    }
    
    /**
     *
     * @return Club[]
     */
    public function fetchClubs()
    {
        return $this->profile->getClubs();
    }
    
    /**
     * @return Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }
    
    protected function loadData()
    {
        $resourcename = $this->profileUrl.$this->profileName.'.json';
        $data = file_get_contents($resourcename);
        $this->profile = SensioProfileMapper::map(json_decode($data));
    }
}
