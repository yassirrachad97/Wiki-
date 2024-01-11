<?php

namespace App\Controller;
use App\Model\TagModel;

class TagController {

    public function Create(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='addTags') {
            $name = $_POST['tag'];
            $tag = new TagModel();
            $tag->setName($name);
           if($tag->create()){ 
            header('location:?uri=tag/getTags');
           } 
           
        } 
    }

    public function getTags(){
         $tag = new TagModel();
         $tags=$tag->findAll();
         include_once '../app/View/admin/tags.php';
    }

 

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='modifierTag') {
            $name = $_POST['tag'];
            $id= $_POST['id'];
            $tag = new TagModel();
            $tag->setName($name);
           if($tag->update($id)){ 
            header('location:?uri=tag/getTags');

           } 
           
        } 
  
      }

      public function delete() {
        if ($_POST['submit'] == 'delettag') {
            $id= $_POST['id'];
                $tag = new TagModel();
                $result = $tag->delete($id);
    
               if ($result) { 
                header('location:?uri=tag/getTags');

               }
          
        }
    }
    public function getTagsForFormulaire(){
        $tag = new TagModel();
       return $tags=$tag->findAll();
   }

   public function getTagsForFilter(){
    $tag = new TagModel();
   return $tags=$tag->findAll();
}
}

?>