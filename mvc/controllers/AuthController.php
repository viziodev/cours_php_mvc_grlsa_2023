<?php
//Service 

require_once "../models/UserModel.php";
class AuthController extends Controller{

    private UserModel $userModel;
    public function __construct()
    {
        parent::__construct();
      
        $this->userModel =new UserModel;
    }


    public function showFormLogin(){
          $this->layout="connexion" ;
          $this->render("auth/login.html.php");
    }

    

    public function login()
    { 
       Validator::isEmail($_POST['login'],"login") ;
       Validator::isVide($_POST['password'],"password","Le Mot de Passe est obligatoire") ;

       if( Validator::valide()){
        
           $user= $this->userModel->findUserByLoginAndPassword($_POST['login'],$_POST['password']);   
           if($user==null){
               Validator::addError("error_connexion","Login ou Mot de Passe incorrect");
           }else{
               //La session ne stocke pas d'objet
               //La session peut stoker soit des donnees de type elementaire
               //soit un tableau
               //Authentification stateFull 
               //Connexion ==> Authentification + Autorisation 
                 Session::set("userconnect",toArray($user) );
                 $this->redirect("categorie");
           }
       }
         Session::set("errors",Validator::getErrors()); 
         Session::set("data",$_POST); 
         $this->redirect("show-login-form");
    }

    
    
    public function logout() {
        Session::unset("userconnect");
        Session::destroySession();
        $this->redirect("show-login-form");
    }
}