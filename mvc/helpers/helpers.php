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