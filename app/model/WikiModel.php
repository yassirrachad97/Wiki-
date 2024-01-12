<?php
  
namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class WikiModel{
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
   
    public function findAll(){
        $conn = $this->db->getConnection();
        $id=$_SESSION['user_id'];
        $sql = "SELECT * FROM `wiki` where `id_user` = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $result;
        }
    
       }

       public function findAllwiki(){
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM `wiki` where is_archived is null ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $result;
        }
       }

       public function findAllForAdmin(){
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM `wiki` WHERE `is_archived` is not NULL  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $result;
        }
       }


public function archiver($id) {
    $conn = $this->db->getConnection();
    $sql = "UPDATE `wiki` SET `is_archived` =? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([null,$id]);
    return $result;
}




public function createWiki($title, $content, $idcat, $userID){
    $conn = $this->db->getConnection();
    $sql = "INSERT INTO `wiki`(`title`, `content`, `creation_date`, `id_user`, `id_category`, `is_archived`) VALUES (?, ?, CURRENT_TIMESTAMP, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$title, $content, $userID, $idcat, 'archived']);
     return $conn->lastInsertId();
}


public function createWikiTAgs( $tagIDs, $wikiid){
    $conn = $this->db->getConnection();
        $sql = "INSERT INTO `wikitags`(`id_Tags`, `id_Wiki`) VALUES  (?, ?)";
     $stmt = $conn->prepare($sql);
     $result = $stmt->execute([$tagIDs,$wikiid]);
     return $result ;
}



public function deleteWiki($id) {
    $conn = $this->db->getConnection();
    $sql = "DELETE FROM `wiki` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);

    return $result;
}


public function updateWiki($wikiID, $title, $content, $categoryID) {
    $conn = $this->db->getConnection();
    
    $sql = "UPDATE `wiki` SET `title`=?, `content`=?, `id_category`=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$title, $content, $categoryID, $wikiID]);
    return $result;
}


public function findOne($id) {
    $conn = $this->db->getConnection();
    $sql = "SELECT wiki.*, users.firstname, users.lastname 
            FROM `wiki`
            JOIN users ON wiki.id_user = users.id
            WHERE wiki.id = ? AND `is_archived` IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchObject();
    return $result;
}

}



?>