<?php
    include('conf.php');
    include($documentRoot.'tpl/header.php');

    include($documentRoot.'tpl/tab_menu.php');

    header('Location: '.$root.'tpl/self.php');

    include($documentRoot.'tpl/footer.php');
?>
