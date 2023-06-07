<?php 
class Validator{
    
  private static array $errors=[];
  
  public  static function isVide($field,$key,$sms="champ obligatoire"){
    if(empty(trim($field))){
        self::$errors[$key]=$sms;   
    }
   
  }

  public  static function isNumber($field,$key,$sms="le champ doit etre un numerique et positif"){
    if(!is_numeric($field) || $field<=0 ){
        self::$errors[$key]=$sms;   
    }
  }
  public  static function valide():bool{
    return count(self::$errors)==0;
  }

  public  static function addError($key,$sms){
          self::$errors[$key]=$sms;
  }

  public static  function isEmail($field,$key,$sms="champ obligatoire"){ }

  public  static function isTel($field,$key,$sms="champ obligatoire"){ }
    

  /**
   * Get the value of errors
   */ 
  public static function getErrors()
  {
    return self::$errors;
  }
}