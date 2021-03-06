<?php
namespace KAC\SiteBundle\Imagine\Image\Fill;

use Imagine\Image\Fill\FillInterface;
use Imagine\Image\Color;
use Imagine\Image\PointInterface;

class ColorFill implements FillInterface
{
    protected $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getColor(PointInterface $position)
    {
        return $this->color;
    }
}