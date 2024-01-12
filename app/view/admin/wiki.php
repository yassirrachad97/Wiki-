<?php
include_once '../app/view/admin/header.php';
?>
<div class="container mt-4  " style="max-width: 80%; margin-left:20%">
<main>

    <div class="d-flexxx d-flex justify-content-between">
   <?php if(  $_SESSION['role_id']==='1') { ?> <button class="btn col-md-2 " style="background-color: #f6f6f6" data-bs-toggle="modal" data-bs-target="#addModal"><span style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">ajouter wiki</span></button> <?php } ?>
       
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">ajouter wiki</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form action="?uri=wiki/create" method="post" >

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea class="form-control" id="content" name="content" required></textarea>
                    </div>


                    <div class="form-group">
                        <label for="idcat">Category:</label>
                        <select class="form-control" id="idcat" name="idcat">
                            <?php  foreach ($categoreis as $category) : ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="tagIDs">Tags:</label>
                    <?php foreach ($tags as $tag) : ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="tag<?= $tag->id ?>" name="tagIDs[]" value="<?= $tag->id ?>">
                            <label class="form-check-label" for="tag<?= $tag->id?>"><?= $tag->name ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>




                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="addwiki" name="submit" class="btn btn-primary">Ajouter</button>
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
            <th>Date de creation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tag">
       
        <?php  if(  $_SESSION['role_id']==='1') { foreach ($wikis as $wiki) :  ?>
                <tr>
                    <td><?= $wiki->id  ?></td>
                    <td class="w-50"><?= $wiki->title ?></td>
                    <td class="w-50"><?= $wiki->creation_date ?></td>
                   
           
                    <td class="d-flex gap-2">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editModal<?=  $wiki->id ?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"> <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/> </svg></button>
                    <form action="?uri=wiki/deleteWiki" method="post">
                        <input type="hidden" value="<?= $wiki->id ?>" name="id">
                        <button type="submit" name="submit" value="deletwiki" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg></button>
                    </form>
                  
                </td>

          </tr>
          <div class="modal fade" id="editModal<?=  $wiki->id   ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">modifier wiki</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="?uri=wiki/create" method="post">
                        <input type="hidden" name="id" value="<?=  $wiki->id ?>">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" value="<?= $wiki->title ?>" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea class="form-control" id="content" name="content" required><?= $wiki->content ?></textarea>
                            </div>


                            <div class="form-group">
                                <label for="idcat">Category:</label>
                                <select class="form-control" id="idcat" name="idcat">
                                    <?php  foreach ($categoreis as $category) : ?>
                                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="tagIDs">Tags:</label>
                            <?php foreach ($tags as $tag) : ?>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="tag<?= $tag->id?>" name="tagIDs[]" value="<?= $tag->id?>">
                                    <label class="form-check-label" for="tag<?= $tag->id?>"><?= $tag->name ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>


                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" value="addwiki" name="submit" class="btn btn-primary">Ajouter</button>
                            </form>   
                        </div>
                       
                    </div>
                </div>
            </div>
          <?php
          endforeach;}
          ?>



<?php  if(  $_SESSION['role_id']==='2') { foreach ($wikisforadmin as $wiki) :  ?>
                <tr>
                    <td><?= $wiki->id  ?></td>
                    <td class="w-50"><?= $wiki->title ?></td>
                    <td class="w-50"><?= $wiki->creation_date ?></td>
                   
           
                    <td class="d-flex gap-2">
                    <form action="?uri=wiki/archiver" method="post" >
                        <input type="hidden" name="id" value="<?= $wiki->id ?>">
                        <button type="submit" name="submit" value="archiverwiki" class="btn btn-light">
                        valider
                        </button>
                    </form>
                </td>

          </tr>
        
          <?php
          endforeach;}
          ?>
        </tbody>
      </table>

</main>

    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>