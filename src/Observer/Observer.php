<?php
namespace Caova\DesignPatternPhp\Observer;
use Caova\DesignPatternPhp\Observer\User;

interface Observer
{
	public function update(User $user);
}

?>