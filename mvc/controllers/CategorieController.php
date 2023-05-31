<?php
require_once "../core/Session.php";
require_once "../core/Model.php";
require_once "../models/CategorieModel.php";
require_once "../core/Validator.php";
//Service 
class CategorieController{
    private CategorieModel $catModel;
    public function __construct()
    {
        $this->catModel =new CategorieModel; 
        Session::startSession();
    }
    public  function lister(){
       
        $categories=  $this->catModel->findAll();
        require_once "./../views/categorie/liste.html.php";
    }

    public  function add(){
       // $libelle=$_POST['libelle'];//Recuperer a partir du formulaire 
           extract($_POST);
        //  $validator=new Validator;
        Validator::isVide($libelle,"libelle","le libelle est obligatoire");  
        if(Validator::valide()){
        try {
            $this->catModel->setLibelle($libelle);
            $this->catModel->insert();
        } catch (\Throwable $th) {
            //throw $th;
             //Erreur Unicite
            // $errors['libelle']="$libelle existe deja dans la BD";
            Validator::addError('libelle',"$libelle existe deja dans la BD");
        }    
    }
    /**
     * Variable de Requete ==> Il n'existe que durant traitement la requete 
     * ces variables sont reinitialisees a chaque requete
     * ces variables sont Crees et detruites par le server   
     * $_GET ==> request GET
     * $_POST ==> request POST
     * $_REQUEST ==> request  GET ou POST
     * 
     * 
     *   Session : une variable qui existe entre plusieurs requetes  ==>$_SESSION
     *   Le tableau  $_SESSION est gere par le developpeur
     *     ==Creer le Tableau ==> session_start()
     *     ==stocke des valeurs dans le Tableau ==> $_SESSION['key']=valeur
     *     ==detruit le Tableau ==> session_destroy()
     */
  
       Session::set("errors",Validator::getErrors());
        //Redirection
       header("location:".BASE_URL."/?page=categorie");//GET

}


}