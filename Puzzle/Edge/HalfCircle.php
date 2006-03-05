<?php
/**
 * PHP Puzzle Maker.
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category    Image
 * @package     Image_Puzzle
 * @author      Michal Felski <fela@fela.pl>
 * @license     http://www.php.net/license/3_0.txt  PHP License 3.0
 * @link        http://pear.php.net/package/Image_Puzzle
 * @version     $id$
 */

/**
 * Half circle edge.
 *
 * @category    Image
 * @package     Image_Puzzle
 * @author      Michal Felski <fela@fela.pl>
 * @license     http://www.php.net/license/3_0.txt  PHP License 3.0
 * @link        http://pear.php.net/package/Image_Puzzle
 * @version     @package_version@
 */
class Image_Puzzle_Edge_HalfCircle extends Image_Puzzle_Edge {

    private $_radius = 0;

    private $_side = 0;

    public function __construct($longitude, $transversal) {
        parent::__construct($longitude, $transversal);
        $this->_radius = min($longitude, $transversal) / rand(40,60) * 10;
        $this->_side = rand()&1;
    }

    public function getLeftTopMargin() {
        return $this->_radius * !$this->_side;
    }

    public function getRightBottomMargin() {
        return $this->_radius * $this->_side;
    }

    public function isTransparent($x, $y) {
        $x = $x - $this->longitude / 2;
        if ($this->_side) {
            return $x*$x + $y*$y < $this->_radius * $this->_radius;
        }
        return $x*$x + $y*$y > $this->_radius * $this->_radius;
    }

}
?>