<?php
$root = "http://localhost:8888/newHtdocs/atom/Artikeltest3";

if(isset($_GET['logout']))
{
    session_unset ( );
    ?>
    Du bist raus aus dem System.<br />
    Gehe zurück zu Start und ziehe keine 4000€ ein.<a href="<?=$root?>/index.php">Start</a><br />
    <?php
}
else
{
    echo '<pre>'; print_r($_SESSION); echo '</pre>';
    //phpinfo();
    //echo $_SERVER["DOCUMENT_ROOT"]."<br /><br />";
    if(isset($_POST['email']) && isset($_POST['password']) || (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1))
    {

        if(!isset($_SESSION['loggedIn']))
        {


            $email = $_POST["email"];
            $passwort = $_POST["password"];

            $abfrage = "SELECT email, password, admin, surname, firstname FROM attendants WHERE email LIKE '$email' LIMIT 1";
            $ergebnis = mysql_query($abfrage);
            $row = mysql_fetch_object($ergebnis);

            if($row->password == $passwort)
            {
                $_SESSION["loggedIn"] = 1;
                $_SESSION["email"] = $row->email;
                $_SESSION["firstname"] = $row->firstname;
                $_SESSION["surname"] = $row->surname;
                $_SESSION["admin"] = $row->admin;
            ?>

            <br />

            <?php
            }
            else
            {
                ?>
                  Benutzername und/oder Passwort waren falsch.<br /><br />


                <?php
            }
        }
        else
        {

?>
           Du bist eingeloggt.<br />
           Deine Daten sind:<br />
           ...<br />

           <a href="<?=$root?>/index.php?logout">Logout</a>
        <?php

        }


    }
    else{


           // $root = 'http://localhost/wichtelbastard/wichtelbastard';
            $action = $root.'/index.php';

        ?>
          <form action="<?=$action?>" method="post">
            Deine Wichtelbastard-E-Mail:<br>
            <input type="text" size="24" maxlength="50"name="email"><br><br>

            Dein Passwort:<br>
            <input type="password" size="24" maxlength="50" name="password"><br>
            <input type="submit" value="Abschicken">
          </form>
    <?php
    }

}

?>
