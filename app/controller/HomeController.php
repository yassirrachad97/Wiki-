<?php

namespace App\Controller;
use App\Model\HomeModel;
class HomeController {

    public function index(){
       $this->getAllWiki();
    }

    public function addWiki(){
        if (isset($_POST['submit'])) {
          extract($_POST);
          $wiki = new HomeModel();
          $wiki->setTitle($title);
          $wiki->setContent($content);
          $wiki->setDate($date);
          if($wiki->save()){
                  $this->index();
          }
        }
      }
      public function UpdateWiki(){
        if (isset($_POST['submit'])) {
          extract($_POST);
          $wiki = new HomeModel();
          $wiki->setTitle($title);
          $wiki->setContent($content);
          $wiki->setDate($date);
          if($wiki->UpdateWiki($id))
          {
            $this->index();
          }
        }
  
      }
      public function getAllWiki(){
        $wikiAll = new HomeModel();
        $wikis= $wikiAll->findAll();
        
        include_once '../app/View/home.php';
    }
    public function deletWiki($id){
        $wikidel = new HomeModel();
        $res = $wikidel->deletWiki($id);
        if($res){
            $this->getAllWiki();
        }
    }
    public function search() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $wikiModel = new HomeModel();
            $searchResults = $wikiModel->searchByName($searchTerm);
        if($searchResults){
            include_once '../app/View/search.php';
            exit(); 
        }
            
        }
    }
}