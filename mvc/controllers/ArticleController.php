<?php
require_once "../core/Model.php";
require_once "../models/ArticleModel.php";
require_once "../models/ArticleConfectionModel.php";
require_once "../models/ArticleVenteModel.php";

//Service 
class ArticleController{
   
    public  function lister(){
        $articleCModel=new ArticleConfectionModel;
        $articleVModel=new ArticleVenteModel;
        $articles=array_merge($articleCModel->findAll(),$articleVModel->findAll());
        require_once "./../views/article/liste.html.php";
    }
}