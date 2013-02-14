<?php
namespace WebIllumination\SiteBundle\Entity;

interface DescribableInterface
{
    /**
     * Get the main description of the object
     * @return DescriptionInterface
     */
    function getDescription();

    /**
     * Get all descriptions
     * @return array
     */
    function getDescriptions();
}