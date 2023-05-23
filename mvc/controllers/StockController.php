<?php
require_once "../models/Model.php";
require_once "../models/CategorieModel.php";
require_once "../models/ArticleModel.php";
require_once "../models/ArticleConfectionModel.php";
require_once "../models/ArticleVenteModel.php";
//Service 
class StockController{
    public  function listerCategorie(){
        $catModel =new CategorieModel;
        //Recoit une Request
        //Realise une Fonctionnalite
       
        /*for ($i=1; $i <= 5; $i++) { 
            $cat =new CategorieModel;
            $cat-> setLibelle("Categorie".$i);
            $cat->insert() ; 
        }*/
        //Response => html+css
        $categories= $catModel->findAll();
        require_once "./../views/categorie/liste.html.php";
    }

    public  function listerArticle(){
        $articles=[];
            for ($i=1; $i <= 10; $i++) { 
                if($i%2==0){
                    $article =new ArticleConfectionModel; 
                    $article->setId($i)
                            -> setLibelle("Article Confection".$i)
                            -> setPrixAchat($i*1000)
                            ->setQteStock($i*100);
                    $article -> setFournisseur("Fournisseur ".$i) ; 
                }else{
                    $article =new ArticleVenteModel; 
                    $article->setId($i)
                    -> setLibelle("Article Vente".$i)
                    -> setLibelle("Article Vente".$i)
                            -> setPrixAchat($i*2000)
                            ->setQteStock($i*200);
                            $article->setDateProduction("1".$i."-05-2023") ;
                }
                    $articles[] = $article;    
            }

        require_once "./../views/article/liste.html.php";
    }
}