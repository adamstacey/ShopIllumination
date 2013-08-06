<?php
namespace KAC\SiteBundle\Imagine\Filter;

use Imagine\Filter\FilterInterface;
use Imagine\Image\Color;
use Imagine\Image\BoxInterface;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use KAC\SiteBundle\Imagine\Image\Fill\ColorFill;

class SquareThumbnailFilter implements FilterInterface
{
    protected $size;
    protected $mode;

    public function __construct(BoxInterface $size, $mode)
    {
        $this->size = $size;
        $this->mode = $mode;
    }

    public function apply(ImageInterface $image)
    {
        // create thumbnail
        $thumb = $image->thumbnail($this->size, $this->mode);

        // create square canvas
        $image->resize($this->size);

        // Clear image
        $image->fill(new ColorFill(new Color('#FFF', 100)));

        // center thumbnail
        $thumbSize = $thumb->getSize();
        $x = (int) floor(($this->size->getWidth()/2)-($thumbSize->getWidth()/2));
        $y = (int) floor(($this->size->getHeight()/2)-($thumbSize->getHeight()/2));
        $pastePoint = new Point($x, $y);

        // place thumbnail on square canvas
        $image->paste($thumb, $pastePoint);

        return $image;
    }
}