<?php
include_once '../app/view/admin/header.php';
?>
<div class="container mt-4  " style="max-width: 80%; margin-left:20%">
<main>

    <div class="d-flexxx d-flex justify-content-between">
    <button class="btn col-md-2 " style="background-color: #f6f6f6" data-bs-toggle="modal" data-bs-target="#addModal"><span style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">ajouter tags</span></button> 
       
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">ajouter tags</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form action="?uri=tag/create" method="post">
                    <label for="cate">name</label> <br>
                    <input id="cate" type="text" name="tag" placeholder="enter le nom de tag" class="w-75 mb-4"><br>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="addTags"  name="submit" class="btn btn-primary">Ajouter</button>
                </form>
                  
                </div>
              
            </div>
        </div>
    </div>
<table class="table align-middle pl-4 mb-0 mt-2 bg-white ">
            <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tag">

        <?php foreach ($tags as $tag) :  ?>
                <tr>
                    <td><?= $tag->id  ?></td>
                    <td class="w-75"><?= $tag->name ?></td>
                   
           
                    <td class="d-flex gap-2">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editModal<?=  $tag->id ?>" >Update</button>
                    <form action="?uri=tag/delete" method="post">
                        <input type="hidden" value="<?= $tag->id ?>" name="id">
                        <button type="submit" name="submit" value="delettag" class="btn btn-danger">delete</button>
                    </form>
                  
                </td>

          </tr>
          <div class="modal fade" id="editModal<?= $tag->id ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">modifier tag</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="?uri=tag/update" method="post">
                            <input type="hidden" name="id" value="<?=$tag->id ?>">
                            <label for="cate">name</label> <br>
                            <input id="cate" type="text" name="tag" value="<?= $tag->name ?>" placeholder="enter le nome de tags" class="w-75 mb-4"><br>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" value="modifierTag"  name="submit" class="btn btn-primary">modifier</button>
                        </form>
                        </div>
                       
                    </div>
                </div>
            </div>
          <?php
          endforeach;
          ?>
        </tbody>
      </table>

</main>

    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>