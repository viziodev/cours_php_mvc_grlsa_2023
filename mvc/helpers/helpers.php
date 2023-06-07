<?php 

function dump($data){
    echo "<pre>";
      var_dump($data);
    echo "</pre>"; 
}

function dateToEn(string $date){
  return \DateTime::createFromFormat("Y-m-d", $date)->format("Y-m-d");
}

function dateToFr(string $date){
   $date= new DateTime($date);
   return $date->format("d-m-Y");
}

//Transformer Array To Objet
function toObject(array $data){
 return  json_decode(json_encode($data), FALSE);
}

//Transformer Objet en Array
function toArray(object $data){
  return json_decode(json_encode($data), true);
}



function redirect(string $path){
  header("location:".BASE_URL."/?page=$path");//GET
  exit;
}