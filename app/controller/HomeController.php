<?php

namespace App\Controller;
use App\Model\HomeModel;

class HomeController {

    public function index(){
       $this->getAllTAsk();
    }
   
    public function addtask(){
      if (isset($_POST['submit'])) {
        extract($_POST);
        $task = new HomeModel();
        $task->setNome($nom);
        $task->setDescription($description);
        $task->setEtat($etat);
        $task->setDate($date);
        if($task->save()){
                $this->index();
        }
      }
    }

    public function Updatetask(){
        if (isset($_POST['submit'])) {
          extract($_POST);
          $task = new HomeModel();
          $task->setNome($nom);
          $task->setDescription($description);
          $task->setEtat($etat);
          $task->setDate($date);
          if($task->Updatetask($id))
          {
            $this->index();
          }
        }
  
      }



    public function getAllTAsk(){
        $UsersAll = new HomeModel();
        $users=$UsersAll->findAll();
        include_once '../app/View/home.php';
    }


    public function deletTask($id){
        $userdel = new HomeModel();
        $res = $userdel->deletTask($id);
        if($res){
            $this->getAllTAsk();
        }
    }


    public function search() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $taskModel = new HomeModel();
            $searchResults = $taskModel->searchByName($searchTerm);
        if($searchResults){
            include_once '../app/View/search.php';
            exit(); 
        }
            
        }
    }
}