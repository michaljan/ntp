<?php

namespace NTPBundle\ValueConventer;

class JsonMorrisConventer{
    public function morrisBarChart($input){
        foreach($input as $array){
            $newResult[]= array('y'=>strval($array['y']),'a'=>intval($array['a']));
        }
        $rawJson=  json_encode($newResult);
        $stringReplaceY=  str_replace('"y"',"y", $rawJson);
        $stringReplaceA=  str_replace('"a"',"a", $stringReplaceY);
        $result=  str_replace('"',"'", $stringReplaceA);
        return $result;
    }
    
}