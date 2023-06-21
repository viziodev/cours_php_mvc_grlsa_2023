<?php
require_once "../models/ArticleConfectionModel.php";
class ApproController extends Controller{
    private ArticleConfectionModel $artConfModel;
    public function __construct(){
        $this->artConfModel=new ArticleConfectionModel;
    }

    //Ajouter un Approvisionnement
      //1-Charger le Formulaire  => GET
      //2-Ajouter apres la soumission du Formulaire  ==> POST
      public  function save(){
         $articles= $this->artConfModel->findAll();

         if(isset($_POST['page'])){
            //Ajouter l'appro
            //Vider Panier
             Session::unset("detailsAppro"); 
             Session::unset("total"); 
         }
         
        $this->render("appro/form.html.php",[
            'articles'=> $articles
        ]) ;
      }
      //Lister + Filtrer Approvisionnement
      public  function index(){
        
      }


      public function addDetail(){ 
            //Valider les informations du formulaire 
             $articleSelect= $this->artConfModel->findById($_POST['articleID']);
              $montant=$_POST['qteAppro']*$articleSelect->getPrixAchat();
             
             if(!Session::isset("detailsAppro")){
                $total=0;
                $detailsAppro=[];
              }else{
                $detailsAppro= Session::get("detailsAppro"); 
                $total= Session::get("total"); 
              }
              $pos=$this->getPositionDetail($detailsAppro,$articleSelect->getId());
              if($pos==-1){
                  $unDetail=[
                    "articleId"=> $articleSelect->getId(),
                    "article"=> $articleSelect->getLibelle(),
                    "qteAppro"=>$_POST['qteAppro'],
                    "prix"=>$articleSelect->getPrixAchat(),
                    "montant"=>$montant,
                   ];
                $detailsAppro[]=$unDetail;
              }else{
                $detailsAppro[$pos]["qteAppro"]+=$_POST['qteAppro'];
                $detailsAppro[$pos]["montant"]+=$montant;
              }
           
             $total+=$montant;
           Session::set("detailsAppro",$detailsAppro);
           Session::set("total",$total);
           $this->redirect("save-appro");
          // dd( $unDetail);
      }

      //Lister les details un Approvisionnement
      public  function detailAppro(){
        
      }

      private function  getPositionDetail(array $data,int $articleId):int{
         foreach ($data  as  $key=>$value) {
              if($value['articleId']==$articleId){
                  return $key;
              }
         }
         return -1;
        
      }
      
}