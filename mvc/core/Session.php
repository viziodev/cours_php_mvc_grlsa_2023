<?php
 class Session{
      public static function startSession(){
        session_start();
      }

      public static function destroySession(){
          session_destroy();
      }

      public static function set($key,$value){
        $_SESSION[$key]=$value;
    }

    public static function isset($key):bool{
         return isset($_SESSION[$key]) ;
    }

    public static function unset($key){
         unset($_SESSION[$key]) ;
   }
    public static function get($key){
           if(self::isset($key)) return $_SESSION[$key];
           return false;
    }
    
}