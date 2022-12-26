<?php
namespace Caova\DesignPatternPhp\Observer;

use Caova\DesignPatternPhp\Observer\User;

class SendEmail implements Observer{
    public function update(User $user)
    {
        $data = $user->getData();
        // echo "email " ." đã được gửi! <br>";
        echo "email " . $user->email ." đã được gửi! <br>";
    }
}
?>