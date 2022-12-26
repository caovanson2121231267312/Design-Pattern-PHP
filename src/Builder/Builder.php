<?php
namespace Caova\DesignPatternPhp\Builder;

class Directer
{
    public function build(BuilderInterFace $build)
    {
        $build->createVehicle();
        $build->addDoors();
        $build->addEngine();
        $build->addWheel();
        return $build->getVehicle();
    }
}

interface BuilderInterFace
{
    public function createVehicle();
    public function addWheel();
    public function addEngine();
    public function addDoors();
    public function getVehicle();
}

class TruckBuilder implements BuilderInterFace
{
    private $truck;
    public function addDoors()
    {
        $this->truck->setPart('rightDoor', new Door("red", array(1,3)));
        $this->truck->setPart('lefttDoor', new Door("yellow", array(1,3)));
    }
    public function addEngine()
    {
        $this->truck->setPart('truckEngine', new Engine);
    }
    public function addWheel()
    {
        $this->truck->setPart('wheel1', new Wheel());
        $this->truck->setPart('wheel2', new Wheel());
        $this->truck->setPart('wheel3', new Wheel());
        $this->truck->setPart('wheel4', new Wheel());

    }
    public function createVehicle()
    {
        $this->truck = new Truck();
    }
    public function getVehicle()
    {
        return $this->truck;
    }
}

class CarBuilder implements BuilderInterFace
{
    private $car;
    public function addDoors()
    {
        $this->car->setPart('rightDoor', new Door("red", array(1,2)));
        $this->car->setPart('lefttDoor', new Door("red", array(1,2)));
        $this->car->setPart('trunkLid', new Door("blue", array(4,4)));
    }
    public function addEngine()
    {
        $this->car->setPart('Engine', new Engine);
    }
    public function addWheel()
    {
        $this->car->setPart('wheelLF', new Wheel());
        $this->car->setPart('wheelRF', new Wheel());
        $this->car->setPart('wheelLR', new Wheel());
        $this->car->setPart('wheelRR', new Wheel());

    }
    public function createVehicle()
    {
        $this->car = new Car();
    }
    public function getVehicle()
    {
        return $this->car;
    }
}

abstract class Vehicle{
    private $data = [];
    public function setPart($key, $val)
    {
        $this->data[$key] = $val;
    }
    public function getPart()
    {
        return $this->data;
    }
}

class Truck extends Vehicle
{
}

class Car extends Vehicle
{
}

class Door
{
    public $width;
    public $height;
    public $color;
    
    public function __construct($color,$sizes)
    {
        $this->width = $sizes[0];
        $this->height = $sizes[1];
        $this->color = $color;
    }
    public function __toString()
    {
        return $this->width . " " . $this->height . " " . $this->$color;
    }
}

class Engine
{
}

class Wheel
{
}

$car = new CarBuilder();
$object = (new Directer())->build($car);
var_dump($object);
?>