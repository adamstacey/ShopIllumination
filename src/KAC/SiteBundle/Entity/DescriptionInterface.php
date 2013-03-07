<?php
namespace KAC\SiteBundle\Entity;

interface DescriptionInterface
{
    function getId();
    function getName();
    function getDescription();
    function getPageTitle();
    function getHeader();
}