<?php
require_once '../app/view/header.php';
?>
    <div class="container">
        <div class="row gap-3 m-3">
        <?php foreach ($wikis as $wiki) : 
          
          ?>
            <div class="card" style="width: 18rem;">
                <img src="http://via.placeholder.com/640x360" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $wiki->title; ?></h5>
                    <p class="card-date"><?= $wiki->creation_date ?></p>
                    <p class="card-date">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim consectetur veritatis dolor nemo, itaque voluptatibus, illo perspiciatis voluptatum nulla voluptatem blanditiis sit possimus tenetur molestias ducimus. Ipsa ullam labore illo?</p>
                    <a href="" class="btn btn shadow">Read more</a>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
