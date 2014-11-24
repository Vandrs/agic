<?php

class Utils {
    public static function moneyMask($number){
        if(empty($number)){
            return "";
        }
        
       $number = 'R$' . number_format((float)$number, 2, ',', '.'); 
        return $number;
    }
    
    public static function ifEmptyThen($value,$alternative){
        if(empty($value)){
            return $alternative;
        }
        return $value;
    }
    
    public static function dateFromTwitter($strDate){
         $date = new DateTime($strDate);
         $brDate = date("d/m/Y H:i",$date->getTimestamp());
         return $brDate;
    }
}

?>