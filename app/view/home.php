<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Tâches</title>
</head>

<body>

    <div class="container mt-5">

        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addTaskModal">
            Ajouter une Tâche
        </button>

        <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTaskModalLabel">Ajouter une Tâche</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="?uri=home/addtask" method="post">
                            <div class="mb-3">
                                <label for="nom" class="form-label">nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="description" required>
                            </div>
                            <div class="mb-3">
                                <select name="etat" id="">
                                    <option value="À faire">À faire</option>
                                    <option value="En cours">En cours</option>
                                    <option value="Terminé">Terminé</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">date</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="date"
                                    required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mb-2">

            <h2>Liste des Tâches</h2>

           
        <div class="search d-flex">
            <input type="text" id="searchInput" onkeyup="search()" placeholder="Search by name">
        </div>
        
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>État</th>
                    <th>Date Limite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="users">
                <?php foreach ($users as $user) :  ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->description ?></td>
                    <td><?= $user->status ?></td>
                    <td><?= $user->deadline ?></td>

                    <td>
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#addTaskModala<?= $user->id ?>">Modifier</a>
                        <a href="?uri=home/deletTask/<?= $user->id ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
                <div class="modal fade" id="addTaskModala<?= $user->id ?>" tabindex="-1" aria-labelledby="addTaskModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTaskModalLabel">modifier une Tâche</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="?uri=home/Updatetask" method="post">
                                    <input type="hidden" name="id" value="<?= $user->id ?>">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">nom</label>
                                        <input type="text" class="form-control" id="nom" value="<?= $user->name ?>" name="nom" placeholder="nom"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">description</label>
                                        <input type="text" class="form-control" id="description" value="<?= $user->description ?>" name="description"
                                            placeholder="description" required>
                                    </div>
                                    <div class="mb-3">
                                        <select name="etat" id="">
                                            <option value="À faire">À faire</option>
                                            <option value="En cours">En cours</option>
                                            <option value="Terminé">Terminé</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">date</label>
                                        <input type="date" class="form-control" id="date" name="date" value="<?= $user->deadline ?>" placeholder="date"
                                            required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script>
            

            function search() {
               
                    let input = document.getElementById("searchInput").value;
                    let url = `?uri=home/search&search=${encodeURIComponent(input)}`;

                    let xml = new XMLHttpRequest();
                    xml.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("users").innerHTML = xml.responseText;
                        }
                    };
                    xml.open("GET", url, true);
                    xml.send();
              
            }

            function deletTask(id){

                let url = `?uri=home/deletTask/${id}`;
                let xml = new XMLHttpRequest();
                    xml.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                          
                        
                        }
                    };
                    xml.open("GET", url, true);
                    xml.send();
              
            }

          

        </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    
</body>

</html>