<?php
  
namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class HomeModel {
    private $db;

    private $nom;
    private $description;
    private $etat;
    private $date;
  

    public function __construct() {
        $this->db = new Database();
    }
   public function setNome($nom) {
    $this->nom = $nom;
   }
  public function getNom() {
    return $this->nom;
  }

  public function setDescription($description) {
    $this->description = $description;
  }
  public function getDescription() {
    return $this->description;
  }

  public function setEtat($etat) {
        $this->etat = $etat;
  }
  public function getEtat() {
    return $this->etat;
  }


  
public function setDate($date) {
    $this->date = $date;
}
public function getDate() {
return $this->date;
}

  public function save() {
    $conn = $this->db->getConnection();
        $sql = "INSERT INTO `tasks`(`name`, `description`, `status`, `deadline`) VALUES (?, ?, ?, ? )";
      
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getNom(), $this->getDescription(), $this->getEtat(), $this->getDate()]);
        if($stmt){
            return true;
        }
  }

  public function Updatetask($id){
       
    $conn = $this->db->getConnection();

    $sql = "UPDATE `tasks`   SET `name` = ? , `description` = ? ,  `status` = ? , `deadline` = ?  WHERE `id` = ? ";

    $stmt = $conn->prepare($sql);
    $result=  $stmt->execute([$this->getNom(), $this->getDescription(), $this->getEtat(), $this->getDate() , $id]);
    if($result){
        return true;
    }
   

}



  public function findAll() {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `tasks`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if($result){
        return $result;
    }
}

public function deletTask($id) {    
    $conn = $this->db->getConnection();
    $sql = "DELETE FROM `tasks` Where id = ?";
    $stmt = $conn->prepare($sql);
    $result= $stmt->execute([$id]);
    if($result){
        return true;
    }
}



public function searchByName($searchTerm) {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `tasks` WHERE `name` LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["%$searchTerm%"]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
        return $result;
    }
}


}



?>