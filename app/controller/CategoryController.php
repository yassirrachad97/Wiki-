<?php

namespace App\Controller;
use App\Model\CategoryModel;

class CategoryController {
public function index(){
    $this->getCategories();
}
    public function Create(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='addCategorie') {
            $name = $_POST['category'];
            $category = new CategoryModel();
            $category->setName($name);
           if($category->create()){ 
           header('location:?uri=category/index');
           } 
           
        } 
    }

    public function getCategories(){
         $category = new CategoryModel();
         $categoreis=$category->findAll();
         include_once '../app/view/admin/category.php';
    }



    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']=='modifierCategorie') {
            $name = $_POST['category'];
            $id= $_POST['id'];
            $category = new CategoryModel();
            $category->setName($name);
           if($category->update($id)){ 
            header('location:?uri=category/index');
           } 
           
        } 
  
      }

      public function delete() {
        if ($_POST['submit'] == 'deletcategory') {
            $id= $_POST['id'];
                $category = new CategoryModel();
                $result = $category->delete($id);
    
               if ($result) { 
                header('location:?uri=category/index');

               }
          
        }
    }
    public function getCategoriesFourFormulaire(){
        $category = new CategoryModel();
        return  $categoreis=$category->findAll();
    }
    
    public function getCategoriesFourFilter(){
        $category = new CategoryModel();
        return  $categoreis=$category->findAll();
    }
  
}

?>