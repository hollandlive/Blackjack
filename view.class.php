<?php
//http://www.smarty.net/forums/viewtopic.php?t=23031&postdays=0&postorder=asc&start=15&sid=cf704b3cf90cc7e4eba9e434ba69f7be


class View { 

 private static $smarty; 

  static function getSmarty() 
  { 
     if (!isset(self::$smarty)) { 
         self::$smarty = new Smarty(); 
     } 

      return self::$smarty; 
  } 

   public static function assign($var, $value) 
  { 
       self::getSmarty()->assign($var, $value); 
   } 
} 