<?php
namespace KAC\SiteBundle\Entity;

interface DescriptionInterface
{
    function getId();
    function getPageTitle();
    function getHeader();
    function getDescription();
    function getMetaDescription();
    function getMetaKeywords();
}