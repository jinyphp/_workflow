<?php

namespace App\Controllers;

class Task extends \Jiny\Board\Controller
{
    public function __construct($type=null)
    {
        $this->init(__FILE__);
    }
}