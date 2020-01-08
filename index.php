<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <title>Projet PHP</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <!-- Navbar temporaire -->
  <p>
    <a href="0.html">Accueil</a>
    <a href="1.html">1</a>
    <a href="index.php?page=2">2</a>
    <a href="index.php?page=3">3</a>
  </p>
  <?php
  // Check if a link is pressed
  if (isset($_GET['page']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
    // Get the page number
    $page = (int)$_GET['page'];
    // Verify if the file is found, if so , store it in a variable
    if(file_exists('source.xml')){
      $xml = simplexml_load_string(file_get_contents('source.xml'));
    } else {
      exit('Erreur lors du chargement du fichier xml');
    }
    $menu = $xml->page[$page]->menu;
    $titre = $xml->page[$page]->titre;
    $content = $xml->page[$page]->content;
    // Display xml page
    echo $menu.$titre.$content;
  }
  ?>
</body>
</html>
