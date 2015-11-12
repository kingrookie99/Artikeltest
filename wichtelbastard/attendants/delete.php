<?php
    include('../conf.php');
    include($documentRoot.'tpl/header.php');
    include($documentRoot.'tpl/tab_menu.php');
    $id = (int) $_GET['id'];
    mysql_query("DELETE FROM `attendants` WHERE `id` = '$id' ") ;
    echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";

?>
<div class="hiddenPath">Admin</div>
<a href='list.php'>Back To Listing</a>

<?
    include('../tpl/footer.php');
?>