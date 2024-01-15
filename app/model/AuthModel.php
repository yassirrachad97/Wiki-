<?php
  
namespace App\Model;

use PDO;

use App\Database\Database;

class AuthModel {
    private $db;

    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function __construct() {
        $this->db = new Database();
    }
    public function setFirstname($firstname){
        $this->firstname=$firstname;
    }
    public function getFirstname(){
       return $this->firstname;
    }
    public function setLastname($lastname){
        $this->lastname=$lastname;
    }
    public function getLastname(){
       return $this->lastname;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
       return $this->email;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function getPassword(){
       return $this->password;
    }
   


    public function registerUser() {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO `users`( `firstname`, `lastname`, `email`, `pasword`, `role_id`) VALUES (?, ?, ?, ? ,?)";
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getFirstname(), $this->getLastname(),$this->getEmail(), $hashedPassword ,1]);
        if($stmt){
            return true;
        }
    }
   
 
    public function loginUser($email , $password){
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM `users` where email = ?";
        $stmt = $conn->prepare($sql);
       
        $stmt->execute([$email]);
        $result = $stmt->fetchObject();
        if ($result && password_verify($password, $result->pasword)) {

            return $result;
           
        } else {
            return false; 
        }
    }

   static public function getUserCount()
    {   $db = new Database();
         $conn = $db->getConnection();

        $sql = "SELECT COUNT(*) as userCount FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function getCategoryCount()
    {
        $db = new Database();
         $conn = $db->getConnection();


        $sql = "SELECT COUNT(*) as countCategory FROM category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function getTagCount()
    { $db = new Database();
        $conn = $db->getConnection();

       
        $sql = "SELECT COUNT(*) as countTag FROM tags";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

   static public function getWikiCount()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $sql = "SELECT COUNT(*) as countWiki FROM wiki";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}



?>