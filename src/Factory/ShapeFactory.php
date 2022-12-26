<?php
namespace Caova\DesignPatternPhp\Factory;

use Caova\DesignPatternPhp\Factory\Shape;

class ShapeFactory {
    static function Create($type, array $sizes) {
        switch ($type) {
            case 'rectangle':
                return new Rectangle($sizes[0], $sizes[1]);
                break;
            case 'triangle':
                return new Triangle($sizes[0], $sizes[1], $sizes[2]);
                break;
        }  
    }
}

class Triangle implements Shape {
    private $sides = array();
    private $perimeter = NULL;
    
    function __construct($s0 = 0, $s1 = 0, $s2 = 0) {
        $this->sides[] = $s0;
        $this->sides[] = $s1;
        $this->sides[] = $s2;
        $this->perimeter = array_sum($this->sides);
    }
    
    public function getArea(): float {
        return (SQRT(($this->perimeter/2) * (($this->perimeter/2) - $this->sides[0]) * (($this->perimeter/2) - $this->sides[1]) * (($this->perimeter/2) - $this->sides[2])));
    }

    public function getPerimeter(): float {
        return $this->perimeter;
    }
}

class Rectangle implements Shape {
    public $width = 0;
    public $height = 0;

    function __construct($w = 0, $h = 0) {
       $this->width = $w;
       $this->height = $h;
    }

    function getArea(): float {
        return ($this->width * $this->height);
    }

    function getPerimeter(): float {
        return ( ($this->width + $this->height) * 2 );
    }
}

?>