<?php
// Récupération du fichier XML
$xml = simplexml_load_string(file_get_contents("source.xml"));
// Si mon get contient un id
if (isset ($_GET['id'])){
  // Alors tu me récupère le chiffre de cette id
  $id = (int)$_GET['id'];
  // Sinon
} else {
  // l'id est égale à 0 ce qui correspond à mon accueil de mon id
  $id = 0;
} ?>
<!doctype html>
<html lang="fr" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <link rel="stylesheet" href="assets/css/<?= ($id + 1) ?>.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Maçonnerie Ocordo</title>
</head>
<body>
  <div class="container-fluid p-0">
    <header id="heroImage">
      <h1 id="mainTitle" class="text-center">Bienvenue chez Ocordo Maçonnerie</h1>
    </header>
    <nav class="navbar navbar-expand-lg row m-0">
      <button class="navbar-toggler align-self-end bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <?php
          // parcours mon fichier xml et va me chercher la clé qui correspond à l'id
          foreach($xml as $key) {?>
            <!-- pour chaque ID,tu rajoutes le .html, on recupère le menu de l'id dont la clé qui correspond au menu pour faire la barre de navigation -->
            <li class="nav-item active"><a class="nav-link text-white" href ="<?= $key['id'] . '.html' ?>"><?= $key->menu ?></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </span>
</nav>
<?php
// Affiche la page
echo $xml->page[$id]->titre;
echo $xml->page[$id]->content;
if ( $id == 3){ ?>
    <div class="d-flex" id="submitContainer">
      <button type="button" class="btn btn-dark btn-lg mx-auto mb-4">Valider le formulaire</button>
    </div>
<?php }
include 'footer.php'; ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
