<?php
  
namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class HomeModel {
    private $db;

    private $title;
    private $content;
    private $date;
  

    public function __construct() {
        $this->db = new Database();
    }
   public function setTitle($title) {
    $this->title = $title;
   }
  public function getTitle() {
    return $this->title;
  }

  public function setContent($content) {
    $this->content = $content;
  }
  public function getContent() {
    return $this->content;
  }

  
public function setDate($date) {
    $this->date = $date;
}
public function getDate() {
return $this->date;
}

  public function save() {
    $conn = $this->db->getConnection();
        $sql = "INSERT INTO `wiki`(`title`, `content`, `creation_date`) VALUES (?, ?, ?, ? )";
      
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getTitle(), $this->getContent(), $this->getDate()]);
        if($stmt){
            return true;
        }
  }

  public function UpdateWiki($id){
       
    $conn = $this->db->getConnection();

    $sql = "UPDATE `wiki`   SET `title` = ? , `content` = ? ,  `creation_date` = ?  WHERE `id` = ? ";

    $stmt = $conn->prepare($sql);
    $result=  $stmt->execute([$this->getTitle(), $this->getContent(), $this->getDate(), $id]);
    if($result){
        return true;
    }
   

}



  public function findAll() {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `wiki`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if($result){
        return $result;
    }
}

public function deletWiki($id) {    
    $conn = $this->db->getConnection();
    $sql = "DELETE FROM `wiki` Where id = ?";
    $stmt = $conn->prepare($sql);
    $result= $stmt->execute([$id]);
    if($result){
        return true;
    }
}



public function searchByName($searchTerm) {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `wiki` WHERE `title` LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["%$searchTerm%"]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
        return $result;
    }
}


}



?>