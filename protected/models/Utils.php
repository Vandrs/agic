<?php

class Utils {
    public static function moneyMask($number){
        if(empty($number)){
            return "";
        }
        
       $number = 'R$' . number_format((float)$number, 2, ',', '.'); 
        return $number;
    }
}

?>