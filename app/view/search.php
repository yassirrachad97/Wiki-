

<?php foreach ($searchResults as $task) : ?>
    <tr>
        <td><?= $wiki->id ?></td>
        <td><?= $wiki->title ?></td>
        <td><?= $wiki->content ?></td>
        <td><?= $wiki->date ?></td>
       
        <td>
            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#addTaskModala<?= $task->id ?>">Modifier</a>
            <a href="?uri=home/deletTask/<?= $task->id ?>" class="btn btn-danger btn-sm">Supprimer</a>
        </td>
    </tr>
<?php endforeach; ?>
