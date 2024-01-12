<?php

namespace App\Controller;
use App\Model\UserModel;

class UserController {

    public function index(){
      include "../app/view/user/home.php";
    }

    public function getwikis(){
        include "../app/view/user/wiki.php";
      }
  
}