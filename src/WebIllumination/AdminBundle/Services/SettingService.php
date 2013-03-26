<?php 

namespace WebIllumination\AdminBundle\Services;

class SettingService {

	protected $container;
    protected $image;

    public function __construct($container) {
        $this->container = $container;
    }

    public function getSomeFunkyShit($id) {
    
    	$brand_description = $this->container->get('doctrine')->getRepository('KAC\SiteBundle\Entity\BrandDescription')->findOneBy(array('brandId' => $id, 'locale' => 'en'));
        return 'testing image service please work, boo fucking ya! BRAND NAME: '.$brand_description->getName();
    }
    
}