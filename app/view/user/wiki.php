<?php
require_once '../app/view/header.php';
?>

<body>

  <header>
  <h1><?=$wikis->title?></h1>
  </header>
<div class="row w-80 m-4 ">
      <div class="col-lg-5 col-sm-12">
        <div class="row  image">
          <img src="./public/assets/img/wiki-logo.png" alt="" class="mainImg">
        </div>
        </div>
        </div>
  <div class="row mt-3">
    <div class="col-12">
      <p>
      <?= $wikis->content?>
      </p>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-12">
      <hr>
      <p class="text-start">Auteur : <span class="text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif"><?= $wikis->firstname ?> <?= $wikis->lastname ?></span></p>
      <p class="text-start">date : <span class="text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif"><?= $wikis->creation_date  ?></span></p>

    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>