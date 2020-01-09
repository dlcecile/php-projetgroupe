<?php
// Récupération du fichier XML
$xml = simplexml_load_string(file_get_contents("source.xml"));
//si mon get contient un id
if (isset ($_GET['id'])){
    // alors tu me récupère le chiffre de cette id
    $id = (int)$_GET['id'];
    //sinon
} else {
    // l'id est égale à 0 ce qui correspond à mon accueil de mon id
    $id = 0;
} ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <title>Projet PHP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
</head>
<body>
//barre de navigation
<?php
// parcours mon fichier xml et va me chercher la clé qui correspond à l'id
foreach($xml as $key) {?>
    <!-- pour chaque ID,tu rajoutes le .html, on recupère le menu de l'id dont la clé qui correspond au menu pour faire la barre de navigation -->
    <a href ="<?= $key['id'] . '.html' ?>"><?= $key->menu ?></a>
<?php }
// Affiche la page
echo $xml->page[$id]->titre;
echo $xml->page[$id]->content;
?>
<?php include 'footer.php'; ?>
</body>
</html>
