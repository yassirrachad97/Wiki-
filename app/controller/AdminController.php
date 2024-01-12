<?php

namespace App\Controller;
use App\Model\AuthModel;

class AdminController {



public function statistique(){
    $countUser= AuthModel::getUserCount();
    $countCategory= AuthModel::getCategoryCount();
    $countWiki= AuthModel::getWikiCount();
    $countTag= AuthModel::getTagCount();
    include_once '../app/view/admin/statistique.php';
}
   
    public function category(){
        include_once '../app/View/category.php';
    }
  
}