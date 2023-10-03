<?php

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
    <title>Formulaire</title>
  </head>
  <body>

  <h1 class="border rounded text-center p-3 m-5 bg-light">Inscription</h1>
        
        <?php // Affichage des éventuelles erreurs 
             if (count($errors) > 0) : ?>
                <div class="border border-danger rounded p-3 m-5 bg-danger">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
        <?php endif; ?>

    <form  action="thanks.php"  method="post">
        <div>
          <label  for="nom">Nom :</label>
          <input  type="text"  id="nom"  name="user_name" class="form-control" required>
        </div>
        <div>
          <label  for="firstname">Firstname :</label>
          <input  type="text"  id="firstname"  name="user_firstname" class="form-control" required>
        </div>
        <div>
          <label  for="courriel">Courriel :</label>
            <input  type="email"  id="courriel"  name="user_email" class="form-control" required>
        </div>
        <div>
          <label  for="phone">Téléphone :</label>
            <input type="int"     id="phone"  name="user_phone" class="form-control" required>
        </div>
        <div>
          <label  for="subject">Choose a subject :</label>
          <select id="subject" name="subject" class="form-control" required>
            <option value="food">Food</option>
            <option value="work">Work</option>
            <option value="holidays">Holidays</otpions>
          </select>
        </div>
        <div>
          <label  for="message">Message :</label>
          <textarea  id="message"  name="user_message" class="form-control" required></textarea>
        </div>
        <div  class="button">
          <button  type="submit">Send your message !</button>
        </div>
    </form>
  </body>
</html>


