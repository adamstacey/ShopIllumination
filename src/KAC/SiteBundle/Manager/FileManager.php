<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;

class FileManager extends Manager
{
    public function __construct($doctrine)
    {
        parent::__construct($doctrine);
    }

    // Generate a clean filename
    public function cleanFilename($filename = '')
    {
        if ($filename != '')
        {
            // Strip tags
            $filename = strip_tags($filename);

            // Convert all HTML entities
            $filename = html_entity_decode($filename);

            // Replace any white space
            $filename = preg_replace("/[\r\n\t\s]+/s", "-", $filename);

            // Replace any dashes
            $filename = preg_replace("/[\-]+/s", "-", $filename);
            $filename = str_replace('--', '-', $filename);

            // Convert to lowercase
            $filename = strtolower($filename);

            // Remove any unexpected characters
            $filename = preg_replace("/[^a-zA-Z0-9\-]?/", "", $filename);
        }
        return $filename;
    }

    // Get a file extension
    public function getFileExtension($filename = '')
    {
        if ($filename != '')
        {
            return pathinfo($filename, PATHINFO_EXTENSION);
        }
        return '';
    }
}