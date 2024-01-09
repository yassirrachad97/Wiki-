<?php

namespace App\Controller;
use App\Model\AuthModel;

class AuthController {

    public function index(){
      include "../app/View/login.php";
    }

    public function register(){
        include "../app/View/register.php";
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

    public function loginUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='login') {
            $email = $_POST['email'];
            $password = $_POST['pasword'];
            $loginUser = new AuthModel();
         
            $user=$loginUser->loginUser($email , $password);
            if($user){
              
              
                $_SESSION['email']= $user->email;
                $_SESSION['firstname']= $user->first_name;
                $_SESSION['lastname']=$user->laste_name;
                $_SESSION['role']=$user->role;
                $_SESSION['user_id']=$user->userID;
             $affichage=new AdminController();
             $affichage->index();

           } else {
            include_once '../app/View/login.php';
           }
        } 
    }

    
  
}