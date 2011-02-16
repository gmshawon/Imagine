<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Cartesian;

use Imagine\Exception\InvalidArgumentException;

final class Coordinate implements CoordinateInterface
{
    /**
     * @var integer
     */
    private $x;

    /**
     * @var integer
     */
    private $y;

    /**
     * Constructs a point of coordinates
     *
     * @param integer $x
     * @param integer $y
     */
    public function __construct($x, $y)
    {
        if ($x < 0 || $y < 0) {
            throw new InvalidArgumentException(
                'A coordinate cannot be positioned ouside of a bounding box'
            );
        }

        $this->x = $x;
        $this->y = $y;
    }

    /**
     * (non-PHPdoc)
     * @see Imagine\Cartesian.CoordinateInterface::getX()
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * (non-PHPdoc)
     * @see Imagine\Cartesian.CoordinateInterface::getY()
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * (non-PHPdoc)
     * @see Imagine\Cartesian.CoordinateInterface::in()
     */
    public function in(SizeInterface $box)
    {
        return $this->x < $box->getWidth() && $this->y < $box->getHeight();
    }
}