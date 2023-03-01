<?php
    function stringCheck($string ) {
 
        $stack = [];
        $stackLen = 0;
         for($i = 0; $i<strlen( $string ); $i++) {
            if($string[$i] == '{' || $string[$i] == '[' || $string[$i] == '(') {
                   array_push($stack, $string[$i]);
                   $stackLen++;
                   

           
            }
            else if ( !empty($stack) && (($string[$i] == ']' && $stack[$stackLen-1] == '[') 
              || ($string[$i] == '}' && $stack[$stackLen-1] == '{') 
              || ($string[$i] == ')' && $stack[$stackLen-1] == '('))) {
                
                array_pop($stack);
                $stackLen--;
 
             }
             else {
                array_push($stack, $string[$i]);
                $stackLen++;
             }
         }

         if(empty($stack)) {
              return true;
         } else {
              false;
         }
   }

$string = "(([(){[[]())(]}]))";

$result = stringCheck($string);
if($result){
    echo 'true';
}
else{
    echo 'false';
}