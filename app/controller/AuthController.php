<?php

namespace App\Controller;
use App\Model\AuthModel;

class AuthController {

    public function index(){
      include "../app/view/login.php";
    }

    public function register(){
        include "../app/view/register.php";
      }

      public function registration() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='regester') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['pasword'];
            $newUser = new AuthModel();
            $newUser->setFirstname($firstname);
            $newUser->setLastname($lastname);
            $newUser->setEmail($email);
            $newUser->setPassword($password);
           if($newUser->registerUser()){
            include "../app/View/login.php";
           } 
           
        } 
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='login') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $loginUser = new AuthModel();
         
            $user=$loginUser->loginUser($email , $password);
            if($user){
              
              
                $_SESSION['email']= $user->email;
                $_SESSION['firstname']= $user->firstname;
                $_SESSION['lastname']=$user->lastname;
                $_SESSION['user_id']=$user->id;
                $_SESSION['role_id']=$user->role_id;
                
                if ($user->role_id == '2') {
                  header('location:?uri=admin/statistique');
                  exit();
              } elseif ($user->role_id == '1') {
                  header('Location:?uri=wiki/getWiki');
                  exit();
              }

            

           } else {
            include_once '../app/view/login.php';
           }
        } 
    }

    public function logout() {
      $_SESSION = array();
      session_destroy();
      header('Location: ?uri=auth'); 
      exit();
  }
  
  
}