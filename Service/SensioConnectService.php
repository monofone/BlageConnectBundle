<?php

namespace Blage\ConnectBundle\Service;

/**
 * Description of SensioConnect
 *
 * @author srohweder
 */
class SensioConnectService
{
    protected $profileUrl;
    protected $profileName;
    protected $profileData;
    
    
    public function __construct($profileUrl, $profileName)
    {
        $this->profileUrl = $profileUrl;
        $this->profileName = $profileName;
        $this->loadData();
    }
            
    public function fetchBadges()
    {
        return $this->profileData->badges;
    }
    
    protected function loadData()
    {
        $resourcename = $this->profileUrl.$this->profileName.'.json';
        $data = file_get_contents($resourcename);
        $this->profileData = json_decode($data);
    }
}
