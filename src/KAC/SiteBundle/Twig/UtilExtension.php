<?php
namespace KAC\SiteBundle\Twig;

use Symfony\Component\Intl\Intl;

class UtilExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'country' => new \Twig_Filter_Method($this, 'countryFilter'),
        );
    }

    public function countryFilter($countryCode)
    {
        return Intl::getRegionBundle()->getCountryName($countryCode);
    }

    public function getName()
    {
        return 'kac_util_extension';
    }
}