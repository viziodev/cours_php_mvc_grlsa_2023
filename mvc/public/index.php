<?php 
require_once "./../controllers/StockController.php";
require_once "./../helpers/helpers.php";
require_once "../models/CategorieModel.php";
$model=new CategorieModel;

$ctrl=new StockController;
if($_GET['page']=='article'){
    $ctrl->listerArticle(); 
}elseif ($_GET['page']=='categorie') {
    $ctrl->listerCategorie(); 
}


//Lister les articles