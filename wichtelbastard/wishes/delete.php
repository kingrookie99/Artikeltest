<?php
    include('../conf.php');
    include('../tpl/header.php');
    if($_GET['id'] && $_SESSION["admin"] == 1) {
        $id = (int) $_GET['id'];
        mysql_query("DELETE FROM `wishes` WHERE `id` = '$id' ") ;
        echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";
    }
    else if($_POST['id'] && $_POST['attendant']) {
        $id = (int) $_POST['id'];
        $att = (int) $_POST['attendant'];
        mysql_query("DELETE FROM `wishes` WHERE `id` = '$id' AND `attendant` = '$att' ") ;
    }
    

?>

<a href='list.php'>Back To Listing</a>

<?
    include('../tpl/footer.php');
?>