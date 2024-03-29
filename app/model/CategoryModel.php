<?php
  
namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class CategoryModel{
    private $db;
    private $name;

    public function __construct() {
        $this->db = new Database();
    }
    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
       return $this->name;
    }
   
   public function create(){
    $conn = $this->db->getConnection();
    $sql = "INSERT INTO `category`(`name`) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$this->getName()]);
    if($stmt){
        return true;
    }
   }


   public function findAll(){
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `category` ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if($result){
        return $result;
    }

   }


   public function update($id){
       
    $conn = $this->db->getConnection();
    $sql = "UPDATE `category`   SET `name` = ?  WHERE `id` = ? ";
    $stmt = $conn->prepare($sql);
    $result=  $stmt->execute([$this->getName(), $id]);
    if($result){
        return true;
    }
   

}



public function delete($id) {
    $conn = $this->db->getConnection();
    $sql = "DELETE FROM `category` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);
    return $result;
}
    
}



?>