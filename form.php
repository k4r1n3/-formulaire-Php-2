<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form  action="thanks.php"  method="post">
        <div>
          <label for="lname">Nom :</label>
          <input type="text"  id="lname"  name="user_lastname" required>
        </div>
        
        <div>
          <label for="fname">Prénom :</label>
          <input type="text"  id="fname"  name="user_firstname" required>
        </div>

        <div>
          <label for="email">Email :</label>
            <input type="email"  id="email" name="user_email" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$" required>
        </div>

        <div>
          <label for="telephone">Numéro de téléphone :</label>
            <input type="telephone"  id="telephone"  name="user_phone" required>
        </div>

        <div> 
          <label for="sujet">Sujet :</label>
            <select id="sujet" name="sujet" required>
                  <option valeur="php">PHP</option>
                  <option valeur="mysql">MySQL</option>
                  <option valeur="js">JS</option>
                  <option valeur="other">Autre</option>
            </select>
        </div>

        <div>
          <label for="message"> Votre message :</label>
           <textarea id="message" name="user_message" placeholder="Rédigez votre message ici." required></textarea>
        </div>

        <div  class="button">
          <button type="submit">Envoyer votre message</button>
        </div>

      </form>

</body>
</html>

<?php
$lnameErr = $fnameErr = $emailErr = $telephoneErr = $sujetErr = $messageErr = "";
$lname = $fname = $email = $telephone = $sujet = $message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["user_firstname"])) {
            $fnameErr = "Le champ prénom est requis";
        } else {
            $fname = test_input($_POST["user_firstname"]);
        }

    if (empty($_POST["user_lastname"])) {
        $lnameErr = "Le champ nom est requis";
    } else {
        $elname = test_input($_POST["user_lastname"]);
    }

    if (empty($_POST["user_email"])) {
        $emailErr = "Le champ email est requis";
    }  elseif   (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Le format de l'email est invalide.";
    } else {
        $email = test_input($_POST["user_email"]);
    }

    if (empty($_POST["user_telephone"])) {
        $telephoneErr = "Le champ téléphone est requis";
    } else {
        $telephone = test_input($_POST["user_phone"]);
    }

    if (empty($_POST["sujet"])) {
        $sujetErr = "Le champ Sujet est requis";
    } else {
        $sujet = test_input($_POST["sujet"]);
    }

    if (empty($_POST["user_message"])) {
        $messageErr = "Le champ Message est requis";
    } else {
        $message = test_input($_POST["user_message"]);
    }
}
