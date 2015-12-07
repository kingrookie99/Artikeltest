<?php

if(isset($_GET['logout']))
{
    session_unset ( );
    ?>
    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
        Du bist raus aus dem System.<br />
        Gehe zurück zu Start und ziehe keine 4000€ ein.<br />
        <a href="<?=$root?>/index.php">Start</a><br />
    </div>
    <?php
}
else
{
     
    //phpinfo();
    //echo $_SERVER["DOCUMENT_ROOT"]."<br /><br />";
    if(isset($_POST['email']) && isset($_POST['password']) || (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1))
    {

        if(!isset($_SESSION['loggedIn']))
        {


            $email = $_POST["email"];
            $passwort = $_POST["password"];

            $abfrage = "SELECT email, password, admin, surname, firstname, pic, id, conterId FROM attendants WHERE email LIKE '$email' LIMIT 1";
            $ergebnis = mysql_query($abfrage);
            $row = mysql_fetch_object($ergebnis);

            if($row->password == $passwort)
            {
                $_SESSION["loggedIn"] = 1;
                $_SESSION["email"] = $row->email;
                $_SESSION["firstname"] = $row->firstname;
                $_SESSION["surname"] = $row->surname;
                $_SESSION["pic"] = $row->pic;
                $_SESSION["admin"] = $row->admin;
                $_SESSION["id"] = $row->id;
                $_SESSION["conterId"] = $row->conterId;
          
           
                //include($documentRoot."tpl/session_data.php");
           
           
            
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
            
            //include($documentRoot."tpl/session_data.php");

        }

        echo '<div class="loginWindow"><div class="mobileOpener"><img src="'.$root.'img/menumob.png" /></div><div class="mobileCloser">X</div>';
        include ($documentRoot."tpl/session_data.php");
        echo '</div>'; 
    }
    else{


           // $root = 'http://localhost/wichtelbastard/wichtelbastard';
            $action = $root.'index.php';

        ?>
          <form action="<?=$action?>" method="post" class="loginForm">
           <h1>Herzlich Willkommen beim Wichtel-Bastard!</h1>
           Bitte melde dich an<br>
           <hr>
           <div class="fields">
                <label>Deine E-Mail:</label><br>
                <input type="text" maxlength="50"name="email"><br>

                <label>Dein Passwort:</label><br>
                <input type="password" maxlength="50" name="password"><br>
                <input type="hidden" name="login">
                <input type="submit" value="Abschicken">
            </div>
          </form>    
          <style>
                .header {
                    background:transparent;
                    border:none;
                    color:#000;
                }
              .header:hover {
                    background:transparent;
                }
            </style>
    <?php  
    }
    
}

?>
