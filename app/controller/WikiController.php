<?php

namespace App\Controller;
use App\Model\WikiModel;

class WikiController {

    public function index(){
        $this->getallwikiforuser();
    }

    public function getWiki(){

     

        $wiki = new WikiModel();
         $wikis = $wiki->findAll();
   
        $wikisforadmin = $wiki->findAllForAdmin();

        $category = new CategoryController();
        $categoreis = $category->getCategoriesFourFormulaire(); 
        
        $tag = new TagController();
        $tags = $tag->getTagsForFormulaire(); 
   
        include_once '../app/view/admin/wiki.php';
   }



    public function archiver() {
        if ($_POST['submit'] == 'archiverwiki') {
            $id = $_POST['id'];
            $wiki = new WikiModel();
            $result = $wiki->archiver($id);
    
            if ($result) {
                header("Location: ?uri=wiki/getWiki");
                exit();
            }
        }
    }

    // website
    public function getallwikiforuser(){
        $wiki = new WikiModel();
        $wikis=$wiki->findAllwiki();

        $category = new CategoryController();
        $categoreis = $category->getCategoriesFourFilter(); 

        $tag = new TagController();
        $tags = $tag->getTagsForFilter(); 
   
        include_once '../app/view/user/home.php';
   }


   
 

public function create() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $idcat = $_POST['idcat'];
        $tagIDs = isset($_POST['tagIDs']) ? $_POST['tagIDs'] : [];
        $userID = $_SESSION['user_id'];

        

        $wikiModel = new WikiModel();

        if (isset($_POST['id'])) {
            $wikiID = $_POST['id'];
            $result = $wikiModel->updateWiki($wikiID, $title, $content, $idcat);
        } else {
            $wikiID = $wikiModel->createWiki($title, $content, $idcat, $userID);
            foreach ($tagIDs as $tagID) {
                $wikiModel->createWikiTAgs($tagID, $wikiID);
            }
        }

        header('location:?uri=wiki/getWiki');
    }
}


public function deleteWiki() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'deletwiki') {
        $id = $_POST['id'];

        $wiki = new WikiModel();
        $result = $wiki->deleteWiki($id);

        if ($result) {
            header("Location: ?uri=wiki/getWiki");
            exit();
        }
    }
}





public function detailwiki($id){
    $wikiModel = new WikiModel();
    $wikis= $wikiModel->findOne($id);
    include_once '../app/view/user/wiki.php';
}





   
}


?>