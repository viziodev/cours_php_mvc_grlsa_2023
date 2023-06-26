<?php
namespace App\Core; 
class Controller{
    protected string  $layout="base";
    
    public function __construct()
    {
        Session::startSession();
    }

    
  
    public function render($view, array $data=[]){
       extract($data);
        ob_start();
        require_once "./../views/".$view;
       $contentForView=ob_get_clean();
       require_once "./../views/".$this->layout.".layout.html.php"; 
    }

    public function redirect(string $path){
        header("location:".BASE_URL."/?page=$path");//GET
        exit;
    }
}