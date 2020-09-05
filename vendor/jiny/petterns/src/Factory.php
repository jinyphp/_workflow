<?php

namespace Jiny\Petterns;

class Factory
{
    const EXT = ".php";
    public function __construct()
    {

    }

    /**
     * 인스턴스를 생성합니다.
     */
    public function make($name, $args=null)
    {
        if($args) {
            return new $name ($args);
        } else {
            return new $name;
        }        
    }

    /**
     * 
     */

}