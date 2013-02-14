<?php
namespace WebIllumination\SiteBundle\Entity;

interface DescriptionInterface
{
    function getId();
    function getName();
    function getDescription();
    function getPageTitle();
    function getHeader();
}