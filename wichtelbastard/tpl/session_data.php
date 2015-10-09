<div>
   <div class="welcomeText">
       Du hast dich erfolgreich eingeloggt.<br />
       Deine Daten sind:<br />
   </div>
   <br />
    <div class="name">
       <b>Name:</b><br />
       <? echo utf8_encode($_SESSION["firstname"])." ".utf8_encode($_SESSION["surname"]) ?>
    </div>
    <div class="email">
       <b>Mail:</b><br />
       <? echo utf8_encode($_SESSION["email"]) ?>
    </div>
    <div class="status">
       <b>Status:</b><br />
       <? if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) { ?>
            Admin
        <?} else {?>
            User
        <?}?>
    </div>
   <br />
   <div class="logout">
       <a href="<?=$root?>index.php?logout">Logout</a>
    </div>
   <br />
</div>