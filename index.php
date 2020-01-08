<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <title>Projet PHP</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<p>
    <a href="index.php?page=0">Accueil</a>
    <a href="index.php?page=1">1</a>
    <a href="index.php?page=2">2</a>
    <a href="index.php?page=3">3</a>
</p>
<?php
if (isset($_GET['page']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $page = (int)$_GET['page'];
    if(file_exists('source.xml')){
        $xml = simplexml_load_string(file_get_contents('source.xml'));
    } else {
        exit('Erreur lors du chargement du fichier xml');
    }
    $menu = $xml->page[$page]->menu;
    $titre = $xml->page[$page]->titre;
    $content = $xml->page[$page]->content;
    echo $menu.$titre.$content;
}
?>
</body>
</html>