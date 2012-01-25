<?php

namespace Blage\ConnectBundle\Service;

use Zend\Cache\Manager as CacheManager;
use Blage\ConnectBundle\Service\SensioConnectService;

class ZendCache
{
    protected $cacheManager;
    protected $cacheName;
    protected $service;

    public function __construct(SensioConnectService $connectService, CacheManager $cacheManager, $cacheName)
    {
        $this->service = $connectService;
        $this->cacheManager = $cacheManager;
        $this->cacheName = $cacheName;
    }

    public function fetchBadges($forceRefresh = false)
    {
        return $this->fetchProfile($forceRefresh)->getBadges();
    }

    public function fetchClubs($forceRefresh = false)
    {
        return $this->fetchProfile($forceRefresh)->getClubs();
    }

    public function fetchProfile($forceRefresh = false)
    {
        $cache = $this->cacheManager->getCache($this->cacheName);

        if (null === $cache) {
            throw new \Exception("Unknown Zend Cache '".$this->cacheName."'");
        }

        $cacheId = $this->cacheName.'_profile_'.$this->service->getProfile()->getUsername();

        if ($forceRefresh || false === ($profile = $cache->load($cacheId))) {
            $profile = $this->service->getProfile();
            $cache->save($profile, $cacheId);
        }

        return $profile;
    }
}
