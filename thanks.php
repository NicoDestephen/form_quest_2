<?php

$name = $_POST["user_name"];
$firstname = $_POST["user_firstname"];
$subject = $_POST["subject"];
$mail = $_POST["user_email"];
$phone = $_POST["user_phone"];
$message = $_POST["user_message"];

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // nettoyage et validation des données soumises via le formulaire 
    if(!isset($_POST['user_firstname']) || trim($_POST['user_firstname']) === '') 
        $errors[] = "Le prénom est obligatoire";
    if(!isset($_POST['user_name']) || trim($_POST['user_name']) === '') 
        $errors[] = "Le nom est obligatoire";
    if(!isset($_POST['user_email']) || trim($_POST['user_email']) === '') 
        $errors[] = "Un mail valide est obligatoire";
    if(!isset($_POST['user_phone']) || trim($_POST['user_phone']) === '')
        $errors[] = "Un mail valide est obligatoire";
      if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo("$mail est une adresse mail valide");
      } else {
        echo("$mail n'est pas une adresse mail valide");
      }
    if(!isset($_POST['subject']) || trim($_POST['subject']) === '') 
        $errors[] = "Un mail valide est obligatoire";
    if(!isset($_POST['message']) || trim($_POST['message']) === '') 
        $errors[] = "Un mail valide est obligatoire";

    if(empty($errors)) {
        // traitement du formulaire
        // puis redirection
        header('Location: thanks.php');
    }
}
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Thanks page</title>
  </head>
  <body>
    <p>Merci <?= $name . " " . $firstname ?> de nous avoir contacté à propos de <?= $subject ?>.
Un de nos conseillers vous contactera soit à l’adresse <?= $mail ?> ou par téléphone au <?= $phone ?> dans les plus brefs délais pour traiter votre demande : 
<?= $message ?>
  </body>
</html>
