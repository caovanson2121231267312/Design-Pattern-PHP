<?php
require  "./vendor/autoload.php";

use Caova\DesignPatternPhp\Factory\ShapeFactory;
use Caova\DesignPatternPhp\Singleton\Singleton;
use Caova\DesignPatternPhp\Facade\Facade;
use Caova\DesignPatternPhp\DependencyInjection\DependencyInjection;
use Caova\DesignPatternPhp\Observer\User;
use Caova\DesignPatternPhp\Observer\SendEmail;
use Caova\DesignPatternPhp\Observer\Login;

# Singleton
$singleton = Singleton::getInstance();


# Factory
$obj = ShapeFactory::Create('rectangle', [2,3]);
echo "<h2>Tạo ra hình chữ nhật:</h2>";
echo '<p>Diện tích hình: ' . $obj->getArea() . '</p>';
echo '<p>Chu vi hình: ' . $obj->getPerimeter() . '</p>';

$obj = ShapeFactory::Create('triangle', [2,3,4]);
echo "<h2>Tạo ra hình tam giác:</h2>";
echo '<p>Diện tích hình: ' . $obj->getArea() . '</p>';
echo '<p>Chu vi hình: ' . $obj->getPerimeter() . '</p>';

# Facade
$facade = new Facade();
echo $facade->operation() . "<br>";


## Observe

$user = new User("cao sơn", 21);
$login = new Login();
$user->attach(new SendEmail());
$user->attach($login);
$user->login("caoson@gmail.com", "12345678");


// $user->detach($login);
$user->login('caovanson@gmail.com', '123');
?>