<?php

namespace App\Controllers;

class Home extends \Jiny\Core\App\Builder
{
    private $Auth;
 
    public function __construct()
    {
        $this->init($this);
        $this->Auth = new \Jiny\Members\Auth($this);
    }

    public function main()
    {
        /*
        $conf = $this->methodConf(__METHOD__);
        print_r($conf);

        if (isset($conf->auth) && $conf->auth) {
            echo "인증필요";
        } else {
            echo "허용";
        }
        */

 
        if(  $this->Auth->status()) {
            $body = file_get_contents("../resource/home.html");
            return $body;
        } else {
            $body = file_get_contents("../resource/home_logout.html");
            return $body;
        }
    }



}