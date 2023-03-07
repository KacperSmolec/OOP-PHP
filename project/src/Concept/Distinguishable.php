<?php
namespace Concept ;

abstract class Distinguishable{
    private  int $id  ;

    public function __construct( int $id){
        $this->id= $id ;
    }
    public  function key() : string {
        $temp = static ::class;
        $temp = strtolower($temp);
        $temp = str_replace("\\","_",$temp);
        return $temp."_".$this->id ;
    }

}