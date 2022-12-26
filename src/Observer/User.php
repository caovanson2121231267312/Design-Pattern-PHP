<?php
namespace Caova\DesignPatternPhp\Observer;

use Caova\DesignPatternPhp\Observer\Subject;
use Caova\DesignPatternPhp\Observer\Observer;

class User implements Subject {
    public string $name;
    public int $age;
    public string $email;
    public string $password;
    public $data;

	public function __construct($name, $age)
	{
		$this->name = $name;
		$this->age = $age;
        $this->data = array();
	}

	public function attach(Observer $observer)
	{
		$isContain = array_search($observer, $this->data);
        if ($isContain === false) {
            $this->data[] = $observer;
        }
	}

	public function detach(Observer $observer)
	{
      foreach($this->data as $key => $val) {
        if ($val == $observer) {
          unset($this->data[$key]);
        }
      }
    }
    
    public function notify() {
	    foreach($this->data as $observer) {
            //dd($this);
	     	$observer->update($this);
	    }
    }

    public function login($email, $password)
    {
    	$this->email = $email;
    	$this->password = $password;
    	echo "Nguoi dung dang dang nhap voi email: " . $email . " mat khau: " . $password . "<br>";
    	$this->notify();
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
?>