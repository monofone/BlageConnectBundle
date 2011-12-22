<?php

namespace Blage\ConnectBundle\Service;

/**
 * Description of SensioProfileMapper
 *
 * @author srohweder
 */
class SensioProfileMapper
{
    public static function map($profileData)
    {
        $profile = new Profile();
        $profile->setUsername($profileData->username);
        $profile->setDisplayName($profileData->display_name);
        $profile->setUrl($profileData->url);
        $profile->setPhotoUrl($profileData->photo_url);
        $profile->setFirstName($profileData->first_name);
        $profile->setLastName($profileData->last_name);
        $profile->setCompany($profileData->company);
        $profile->setCountry($profileData->country);
        $profile->setBiography($profileData->biography);
        $profile->setMemberSince(new \DateTime($profileData->member_since));
        $profile->setWebsiteUrl($profileData->website_url);
        $profile->setBlogUrl($profileData->blog_url);
        $profile->setBlogFeedUrl($profileData->blog_feed_url);
        $profile->setGithubUrl($profileData->github_url);
        $profile->setTwitterUrl($profileData->twitter_url);
        $profile->setLinkedinUrl($profileData->linkedin_url);
        self::mapBadges($profile, $profileData->badges);
        self::mapClubs($profile, $profileData->clubs);
        
        return $profile;
    }
    
    /**
     * @return Badge
     */
    protected static function mapBadges($profile, $badgeData)
    {
        foreach($badgeData as $data){
            $badge = new Badge($data->url, $data->picture_url, $data->name);
            $profile->addBadge($badge);
        }
    }
    
    protected static function mapClubs($profile, $clubData)
    {
        foreach($clubData as $data){
            $club = new Club($data->url, $data->picture_url, $data->name);
            $profile->addClub($club);
        }
    }
}
