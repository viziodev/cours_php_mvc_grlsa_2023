<?php 

require_once "./../controllers/CategorieController.php";
require_once "./../controllers/ArticleController.php";
require_once "./../controllers/AuthController.php";
require_once "./../controllers/ApproController.php";
//Router ==> Choisir le controller et d'executer une Methode du controlleur
$ctrlCat=new CategorieController;
$ctrlArt=new ArticleController;
$ctrlAuth=new AuthController;
$ctrlAppro=new ApproController;

//if(isset($_GET['page']) || isset($_POST['page'])){  ==> $_REQUEST['page']
    //$page = isset($_GET['page'])?$_GET['page']: $_POST['page'];
    if(isset($_REQUEST['page']) )  {
        
    if( $_REQUEST['page']=='article'){
        $ctrlArt->lister(); 
    }elseif ( $_REQUEST['page']=='categorie') {
        $ctrlCat->lister(); 
    } elseif ( $_REQUEST['page']=='add-categorie') {
        $ctrlCat->add(); 
    } 
    elseif ($_REQUEST['page']=='show-form-article') {
        $ctrlArt->showForm(); 
    } 
     elseif ($_REQUEST['page']=='save-article') {
        $ctrlArt->save(); 
    }
    elseif ($_REQUEST['page']=='show-login-form') {
        $ctrlAuth->showFormLogin(); 
    }
    elseif ($_REQUEST['page']=='login') {
        $ctrlAuth->login(); 
    }elseif ($_REQUEST['page']=='logout') {
           $ctrlAuth->logout(); 
    }elseif ($_REQUEST['page']=='save-appro') {
          $ctrlAppro->save();
    }elseif ($_REQUEST['page']=='add-detail') {
        $ctrlAppro->addDetail();
  }

    //
     
}else{
    $ctrlAuth->showFormLogin(); 
}