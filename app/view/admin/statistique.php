<?php
include_once '../app/view/admin/header.php';
?>
<div class="container mt-4  " style="max-width: 80%; margin-left:20%">
<main>
 <div class="d-flex justify-content-between gap-3 mb-4">
  <div class="card w-25 shadow-sm">
    <h5 class="card-title">Nombre des utilisateur</h5>
    <p class="card-text"><?php echo $countUser[0]->userCount; ?></p>

  </div>

  <div class="card w-25 shadow-sm">
    <h5 class="card-title">Nombre des Categories</h5>
    <p class="card-text"><?php echo $countCategory[0]->countCategory; ?></p>
  </div>

  <div class="card w-25 shadow-sm">
    <h5 class="card-title">Nombre des Tags</h5>
    <p class="card-text"><?php echo $countTag[0]->countTag; ?></p>
  </div>

  <div class="card w-25 shadow-sm">
    <h5 class="card-title">Nombre des Wikis</h5>
    <p class="card-text"><?php echo $countWiki[0]->countWiki; ?></p>
  </div>
 </div>

</main>

    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>