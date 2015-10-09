<?php
    include('conf.php');
    include($documentRoot.'tpl/header.php');

    if(isset($_SESSION['loggedIn'])) {
        if(isset($_SESSION['admin'])&& $_SESSION['admin']==1)
        {?>

            <a href="<?=$root?>attendants/list.php">Teilnehmer</a>

        <?php
        }
        else{
            ?>

            <a href="#">Gehe zu deinem Profil!</a>

            <?
        }
    }

    include($documentRoot.'tpl/footer.php');
?>
