<?php
namespace Caova\DesignPatternPhp\Singleton;

class Singleton {

    static private $instance = NULL;
    private $settings = array();

    private function __construct() {
        
    }

    public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
    
    public function set($index, $value) {
        $this->settings[$index] = $value;
    }
    
    public function get($index) {
        return $this->settings[$index];
    }
}

// Tạo một đối tượng Config
$config = Singleton::getInstance();
$config->set('database_connected', true);
echo '<p>$config["database_connected"]: ' . $config->get('database_connected') . '</p>'."\n";


$test = Singleton::getInstance();
echo '<p>$test["database_connected"]: ' . $test->get('database_connected') . '</p>'."\n";

?>