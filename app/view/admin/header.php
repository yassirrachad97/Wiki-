
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>WIKI</title>
</head>
<body>

  <div class="col-2 position-fixed d-flex flex-column justify-content-between" style="background-color: #f6f6f6; height: 100vh">
    <div>

    <a class="navbar-brand" href="#"><img src="./public/assets/img/wiki-logo.png" alt="" width="50" height="40"><span style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color :gray">Wi</span><span style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color:brown">Ki</span></a>
      <hr class="mx-3" />

      <?php  if(  $_SESSION['role_id']==='2') {   ?>
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #f6f6f6;">
              statistiques
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
            <ul class="list-unstyled">
            <li><a class="dropdown-item my-4" href="?uri=admin/statistique">voir les statistiques</a></li>
           
               
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="background-color: #f6f6f6;">
              category
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
            <ul class="list-unstyled">
            <li><a class="dropdown-item my-4" href="?uri=category">liste des category</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="background-color: #f6f6f6;">
              Tags
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
            <ul class="list-unstyled">
                <li><a class="dropdown-item my-4" href="?uri=tag/getTags">liste des tags</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour" style="background-color: #f6f6f6;">
              Wiki
            </button>
          </h2>
          <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
            <ul class="list-unstyled">
            <li><a class="dropdown-item my-4" href="?uri=wiki/getWiki">liste WIki</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>

    </div>
  </div>
  <div class="col-10" style="background-color: #f6f6f6; width: 100%">
    <div class="row">
      <div class="d-flex justify-content-end align-items-center me-5 px-5">
        <div class="d-flex me-2 w-25" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-gray" type="submit">
            <span class="material-symbols-outlined"> search </span>
          </button>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=    $_SESSION['firstname']." ". $_SESSION['lastname'] ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?uri=auth/logout">logout</a></li>
           
          </ul>
        </div>
      </div>
    </div>
    
  </div>