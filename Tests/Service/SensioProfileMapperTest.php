<?php

namespace Blage\CoonectBundle\Tests\Service;

use Blage\ConnectBundle\Service\SensioProfileMapper;
/**
 * Description of SessionProfileMapperTest
 *
 * @author srohweder
 */
class SensioProfileMapperTest extends \PHPUnit_Framework_TestCase
{
    protected function getProfileData()
    {
        $profileData = new \StdClass();
        $profileData->username = 'foo';
        $profileData->display_name = 'foo bar';
        $profileData->url = 'http://foo.bar';
        $profileData->photo_url = 'http://foo.bar';
        $profileData->first_name = 'foo';
        $profileData->last_name = 'bar';
        $profileData->company = 'company';
        $profileData->country = 'country';
        $profileData->biography = 'biography';
        $profileData->website_url = 'http://foo.bar/website';
        $profileData->member_since = '2005-10-14T22:00:00+00:00';
        $profileData->blog_url = 'http://foo.bar/blog';
        $profileData->blog_feed_url = 'http://foo.bar/blog_feed';
        $profileData->github_url = 'http://foo.bar/github';
        $profileData->twitter_url = 'http://foo.bar/twitter';
        $profileData->linkedin_url = 'http://foo.bar/linkedin';
        
        $badge1 = new \StdClass();
        $badge1->name = 'foo';
        $badge1->url = 'http://foo.bar/badge1';
        $badge1->picture_url = 'http://foo.bar/badge1/picture';
        $badge2 = new \StdClass();
        $badge2->name = 'bar';
        $badge2->url = 'http://foo.bar/badge2';
        $badge2->picture_url = 'http://foo.bar/badge2/picture';
        
        $profileData->badges = array($badge1, $badge2);
        
        $profileData->clubs = array();
                
        
        
        return $profileData;
    }
    
    public function testProfileMap()
    {
        $profile = SensioProfileMapper::map($this->getProfileData());
        $this->assertEquals('foo', $profile->getUsername());
        $this->assertEquals('foo bar', $profile->getDisplayName());
        $this->assertEquals('http://foo.bar', $profile->getUrl());
        $this->assertEquals('http://foo.bar', $profile->getPhotoUrl());
        $this->assertEquals('foo', $profile->getFirstName());
        $this->assertEquals('bar', $profile->getLastName());
        $this->assertEquals('company', $profile->getCompany());
        $this->assertEquals('country', $profile->getCountry());
        $this->assertEquals('biography', $profile->getBiography());
        $this->assertInstanceof('\\DateTime', $profile->getMemberSince());
        $this->assertEquals('http://foo.bar/website', $profile->getWebsiteUrl());
        $this->assertEquals('http://foo.bar/blog', $profile->getBlogUrl());
        $this->assertEquals('http://foo.bar/blog_feed', $profile->getBlogFeedUrl());
        $this->assertEquals('http://foo.bar/github', $profile->getGithubUrl());
        $this->assertEquals('http://foo.bar/twitter', $profile->getTwitterUrl());
        $this->assertEquals('http://foo.bar/linkedin', $profile->getLinkedinUrl());
    }
    
    public function testBadgeMap()
    {
        $profile = SensioProfileMapper::map($this->getProfileData());
        $this->assertEquals(2, count($profile->getBadges()));
        $badges = $profile->getBadges();
        $fooBadge = $badges['foo'];
        $this->assertInstanceof('\\Blage\ConnectBundle\Service\Badge',$fooBadge);
        $this->assertEquals('foo', $fooBadge->getName());
        $this->assertEquals('http://foo.bar/badge1', $fooBadge->getUrl());
        $this->assertEquals('http://foo.bar/badge1/picture', $fooBadge->getPictureUrl());
    }
}
