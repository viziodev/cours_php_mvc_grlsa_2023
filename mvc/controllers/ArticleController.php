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
        parent::__construct();
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
          
           Validator::isVide($_POST['libelle'],"libelle");
           Validator::isNumber($_POST['qteStock'],"qteStock");
           Validator::isVide($_POST['categorie'],"categorie");

           if(Validator::valide()){
           $this->articleModel->setLibelle($_POST['libelle']); 
           $this->articleModel->setQteStock($_POST['qteStock']); 
           $this->articleModel->setPrixAchat($_POST['prixAchat']);
           $this->articleModel->setType($_POST['type']);
           $this->articleModel->setCategorieId($_POST['categorie']);
         // $this->articleModel->hydrate($_POST);
           if($_POST['type']=="ArticleConfection"){
               $data=$_POST['fournisseur'];
              
           }elseif($_POST['type']=="ArticleVente"){
            
               $data=dateToEn($_POST['dateProduction']);
            
           }
             $this->articleModel->insert($data);
       
              $this->redirect("article");
        }else{
            // dump(Validator::getErrors());
              Session::set("errors",Validator::getErrors()); 
              Session::set("data",$_POST); 
             $this->redirect("show-form-article");
        }
         
    }
}