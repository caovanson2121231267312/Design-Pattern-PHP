<?php
namespace Caova\DesignPatternPhp\Observer;

use Caova\DesignPatternPhp\Observer\User;

class Login implements Observer{
    public function update(User $user)
    {
        $data = $user->getData();
        // echo "email " ." đã được đăng nhập! <br>";
        echo "email " . $user->email ." đã được đăng nhập! <br>";
    }
}
?>