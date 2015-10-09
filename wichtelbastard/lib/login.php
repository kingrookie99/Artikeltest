<?php

$email = $_POST["email"];
$passwort = $_POST["password"];

$abfrage = "SELECT email, password, admin FROM attendants WHERE email LIKE '$email' LIMIT 1";
$ergebnis = mysql_query($abfrage);
$row = mysql_fetch_object($ergebnis);

if($row->passwort == $passwort)
    {

    $_SESSION["email"] = $email;?>
    Login erfolgreich. <br>
    Du bis eingeloggt als <?=$row->firstname?> <?=$row->surname?>.


    <?php
    }
else
    {
    ?>
      Benutzername und/oder Passwort waren falsch.<br /><br />
      <form action="index.php" method="post">
        Deine Wichtelbastard-E-Mail:<br>
        <input type="text" size="24" maxlength="50"name="email"><br><br>

        Dein Passwort:<br>
        <input type="password" size="24" maxlength="50" name="passwort"><br>
        <input type="submit" value="Abschicken">
      </form>

    <?php
    }

?>
