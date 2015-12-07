<?php
    include('../conf.php');
    include($documentRoot.'tpl/header.php');
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1 && $_SESSION['admin'] == '1') {
	    include($documentRoot.'tpl/tab_menu.php');
	    $id = (int) $_GET['id'];
	    mysql_query("DELETE FROM `attendants` WHERE `id` = '$id' ") ;
	    echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";

?>
<div class="hiddenPath">Admin</div>
<a href='list.php'>Back To Listing</a>

<?
	}
    include('../tpl/footer.php');
?>