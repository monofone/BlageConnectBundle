<?php
namespace Blage\ConnectBundle\Service;

class Profile
{
    protected $username;
    
    protected $displayName;
    
    protected $url;
    
    protected $photoUrl;
    
    protected $firstName;
    
    protected $lastName;
    
    protected $company;
    
    protected $country;
    
    protected $biography;
    
    /**
     *
     * @var DateTime 
     */
    protected $memberSince;
    
    protected $websiteUrl;
    
    protected $blogUrl;
    
    protected $blogFeedUrl;
    
    protected $facebookUrl;
    
    protected $githubUrl;
    
    protected $twitterUrl;
    
    protected $linkedinUrl;
    
    protected $badges = array();
    
    protected $clubs = array();
    
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getBiography()
    {
        return $this->biography;
    }

    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    public function getMemberSince()
    {
        return $this->memberSince;
    }

    public function setMemberSince(\DateTime $memberSince)
    {
        $this->memberSince = $memberSince;
    }

    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
    }

    public function getBlogUrl()
    {
        return $this->blogUrl;
    }

    public function setBlogUrl($blogUrl)
    {
        $this->blogUrl = $blogUrl;
    }

    public function getBlogFeedUrl()
    {
        return $this->blogFeedUrl;
    }

    public function setBlogFeedUrl($blogFeedUrl)
    {
        $this->blogFeedUrl = $blogFeedUrl;
    }

    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    public function setFacebookUrl($facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;
    }

    public function getGithubUrl()
    {
        return $this->githubUrl;
    }

    public function setGithubUrl($githubUrl)
    {
        $this->githubUrl = $githubUrl;
    }

    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    public function setTwitterUrl($twitterUrl)
    {
        $this->twitterUrl = $twitterUrl;
    }

    public function getLinkedinUrl()
    {
        return $this->linkedinUrl;
    }

    public function setLinkedinUrl($linkedinUrl)
    {
        $this->linkedinUrl = $linkedinUrl;
    }

    public function getBadges()
    {
        return $this->badges;
    }

    public function setBadges($badges)
    {
        $this->badges = $badges;
    }

    public function getClubs()
    {
        return $this->clubs;
    }

    public function setClubs($clubs)
    {
        $this->clubs = $clubs;
    }
    
    public function addBadge(Badge $badge)
    {
        $this->badges[$badge->getName()] = $badge;
    }
    
    public function addClub(Club $club)
    {
        $this->clubs[] = $club;
    }
}