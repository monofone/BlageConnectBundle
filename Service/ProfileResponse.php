<?php

class ProfileResponse
{
    protected $profileData;
    
    protected $badges;
    
    public function __construct($profileData)
    {
        $this->profileData = $profileData;   
    }
    
    protected function initialize()
    {
        
    }
    
    public function getBadges()
    {
        return $this->profileData->badges;
    }
    
    
}