<?php foreach ($searchResults as $wiki) : 
          
          ?>
            <div class="card" style="width: 18rem;">
                <img src="./public/assets/img/wiki-logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $wiki->title; ?></h5>
                    <p class="card-date"><?= $wiki->creation_date ?></p>
                    <p class="card-date">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur veritatis dolor nemo, itaque voluptatibus, illo perspiciatis voluptatum nulla voluptatem blanditiis sit possimus tenetur molestias ducimus. Ipsa ullam labore illo?</p>
                    <a href="?uri=wiki/detailwiki/<?= $wiki->id ?>" class="btn btn shadow">Read more</a>
                </div>
            </div>
        <?php endforeach ?>