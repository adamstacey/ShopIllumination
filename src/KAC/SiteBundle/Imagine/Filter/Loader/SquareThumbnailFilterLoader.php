<?php
namespace KAC\SiteBundle\Imagine\Filter\Loader;

use Avalanche\Bundle\ImagineBundle\Imagine\Filter\Loader\LoaderInterface;
use Imagine\Image\Box;
use Imagine\Image\ManipulatorInterface;
use KAC\SiteBundle\Imagine\Filter\SquareThumbnailFilter;

class SquareThumbnailFilterLoader implements LoaderInterface
{
    public function load(array $options = array())
    {
        $mode = $options['mode'] === 'outset' ?
            ManipulatorInterface::THUMBNAIL_OUTBOUND :
            ManipulatorInterface::THUMBNAIL_INSET;
        list($width, $height) = $options['size'];

        return new SquareThumbnailFilter(new Box($width, $height), $mode);
    }
}