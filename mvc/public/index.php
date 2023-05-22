<?php 
require_once "./../controllers/StockController.php";

$ctrl=new StockController;
if($_GET['page']=='article'){
    $ctrl->listerArticle(); 
}elseif ($_GET['page']=='categorie') {
    $ctrl->listerCategorie(); 
}


//Lister les articles