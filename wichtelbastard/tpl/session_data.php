           <div>
           Du hast dich erfolgreich eingeloggt.<br />
           Deine Daten sind:<br />
           <br />
           <b>Name:</b><br />
           <? echo utf8_encode($_SESSION["firstname"])." ".utf8_encode($_SESSION["surname"]) ?><br />
           <b>Mail:</b><br />
           <? echo utf8_encode($_SESSION["email"]) ?><br />
           <b>Status:</b><br />
           <? if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) { ?>
                Admin
            <?} else {?>
                User
            <?}?>
           
           <br /><br />
           <a href="<?=$root?>index.php?logout">Logout</a><br />
           <br />
           </div>