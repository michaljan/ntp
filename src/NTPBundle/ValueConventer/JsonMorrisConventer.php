<?php

namespace NTPBundle\ValueConventer;

/**
 * @package morris
 * @author Michal
 * @final
 */

class JsonMorrisConventer{
    
    /**
     * 
     * @param array $input 
     * @return $string
     *
     * Formats array to return json encoded string
     * acceptable by Morris Bar Chart jquery  
     *     
     */
    public function morrisBarChart($input){
        foreach($input as $array){
            $newResult[]= array('y'=>strval($array['y']),'a'=>strval($array['a']));
        }
        $rawJson=  json_encode($newResult);
        $stringReplaceY=  str_replace('"y"',"y", $rawJson);
        $stringReplaceA=  str_replace('"a"',"a", $stringReplaceY);
        $result=  str_replace('"',"'", $stringReplaceA);
        return $result;
    }
    
}