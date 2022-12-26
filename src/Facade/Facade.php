<?php
namespace Caova\DesignPatternPhp\Facade;

class Facade
{
    protected $system1;
    protected $system2;

    public function __construct()
    {
        $this->system1 = new System1();
        $this->system2 = new System2();
    }

    public function operation()
    {
        $result = "Khởi tạo hệ thống:\n". "<br>";
        $result .= $this->system1->operation1(). "<br>";
        $result .= $this->system2->operation1(). "<br>";
        $result .= "Khởi động hệ thống:\n". "<br>";
        $result .= $this->system1->operationN(). "<br>";
        $result .= $this->system2->operationZ(). "<br>";
        return $result;
    }
}

class System1 {
    function operation1()
    {
        return "system1: sẵn sàng!\n";
    }

    function operationN()
    {
        return "system1: khởi động!\n";
    }
}

class System2 {
    public function operation1()
    {
        return "system2: sẵn sàng!\n";
    }

    public function operationZ()
    {
        return "system2: khởi động!\n";
    }
}