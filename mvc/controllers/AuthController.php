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
       Validator::isVide($_POST['password'],"password") ;

       if( Validator::valide()){
        
           $user= $this->userModel->findUserByLoginAndPassword($_POST['login'],$_POST['password']);   
           if( $user==null){
               Validator::addError("error_connexion","Login ou Mot de Passe incorrect");
           }else{
                 Session::set("userconnect", toArray($user));
                 $this->redirect("categorie");
           }
       }
         Session::set("errors",Validator::getErrors()); 
         Session::set("data",$_POST); 
       $this->redirect("show-login-form");
    }

    
    
    public function logout() {
        Session::set("userconnect",[]);
        Session::unset("userconnect");
        session_unset();
        Session::destroySession();
        $this->redirect("show-login-form");
    }
}