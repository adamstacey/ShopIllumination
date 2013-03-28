<?php
namespace KAC\SiteBundle\Manager;

use KAC\SiteBundle\Entity\Offer;

class OfferManager extends Manager
{
    public function createOffer()
    {
        $offer = new Offer();

        $offer->addDescription(new Offer\Description());

        return $offer;
    }
}