<?php
/*
 * This file is part of the jinyPHP package.
 *
 * (c) hojinlee <infohojin@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jiny\Http;

class Endpoint
{
    private $points=[];
    private $query=[];

    /**
     * 싱글턴 
     */
    protected static $_instance;
    public static function instance($arg=null)
    {
        if (!isset(self::$_instance)) {
            // 자기 자신의 인스턴스를 생성합니다.            
            self::$_instance = new self($arg); 
            self::$_instance->init();       
        } 
        return self::$_instance;
    }

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $points = explode("/", $_SERVER['PATH_INFO']);
        unset($points[0]); // 0번 배열은 제거
        $this->points = array_merge($points);

        if (isset($_SERVER['QUERY_STRING'])) {
            parse_str($_SERVER['QUERY_STRING'], $this->query);
        } 
    }

    public function params($i=0)
    {
        if ($i) return array_slice($this->points, $i); // $i 이후의 배열만 반환
        return $this->points;
    }
    
    public function first()
    {
        if(isset($this->points[0]) && $this->points[0]) {
            return $this->points[0];
        }
    }

    public function second()
    {
        if(isset($this->points[1]) && $this->points[1]) {
            return $this->points[1];
        }
    }

    public function third()
    {
        if(isset($this->points[2]) && $this->points[2]) {
            return $this->points[2];
        }
    }

    public function fourth()
    {
        if(isset($this->points[3]) && $this->points[3]) {
            return $this->points[3];
        }
    }

    // 마지막
    public function last($i=0)
    {
        $rev = array_reverse($this->points);
        return $rev[$i];
    }

}