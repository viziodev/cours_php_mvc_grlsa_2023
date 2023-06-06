<?php
require_once "../models/ArticleModel.php";
require_once "../models/ArticleConfectionModel.php";
require_once "../models/ArticleVenteModel.php";
require_once "../models/CategorieModel.php";
//Service 
class ArticleController extends Controller{
  
    private CategorieModel $catModel;
    private ArticleModel $articleModel;
    public function __construct()
    {
        $this->catModel =new CategorieModel;  
        $this->articleModel =new ArticleModel;  
    }
    public  function lister(){
        $articleCModel=new ArticleConfectionModel;
        $articleVModel=new ArticleVenteModel;
        $articles=array_merge($articleCModel->findAll(),$articleVModel->findAll());
        $this->render("article/liste.html.php",[
            "articles"=>$articles
        ]);
    }

    public  function showForm(){
         $categories=  $this->catModel->findAll();
          $this->render("article/form.html.php",[
            "categories"=>$categories,
            "types"=>  $this->articleModel->getTypesArticle()
          ]);
    }

    public  function save(){
          
           $this->articleModel->setLibelle($_POST['libelle']); 
           $this->articleModel->setQteStock($_POST['qteStock']); 
           $this->articleModel->setPrixAchat($_POST['prixAchat']);
           $this->articleModel->setType($_POST['type']);
           $this->articleModel->setCategorieId($_POST['categorie']);
         // $this->articleModel->hydrate($_POST);
           if($_POST['type']=="ArticleConfection"){
               $data=$_POST['fournisseur'];
               dump("ok");
           }elseif($_POST['type']=="ArticleVente"){
            
               $data=dateToEn($_POST['dateProduction']);
            
           }
           $this->articleModel->insert($data);

          $this->redirect("article");
    }
}