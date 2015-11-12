<?php
    include('../conf.php');
    include($documentRoot.'tpl/header.php');
    include($documentRoot.'tpl/tab_menu.php');
    echo '<a class="back" href="list.php">Back to listing</a>';
    if (isset($_GET['id']) ) {
        $id = (int) $_GET['id'];
        if (isset($_POST['submitted'])) {
            foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
            $sql = "UPDATE `wishes` SET  `title` =  '{$_POST['title']}' ,  `shortDescription` =  '{$_POST['shortDescription']}',  `store` =  '{$_POST['store']}'  WHERE `id` = '$id' ";
            mysql_query($sql) or die(mysql_error());
            echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
            
        }
        $row = mysql_fetch_array ( mysql_query("SELECT * FROM `wishes` WHERE `id` = '$id' "));
        
?>
        <div class="hiddenPath">Admin</div>
        <form action='' method='POST' class="adminForm">
            <p><b>Titel:</b><br /><input type='text' name='title' value='<?= stripslashes($row['title']) ?>' />
            <p><b>Kurzbeschreibung:</b><br /><input type='text' name='shortDescription' value='<?= stripslashes($row['shortDescription']) ?>' />
            <p><b>Wo zu kaufen? (Link o. Laden):</b><br /><input type='text' name='store' value='<?= stripslashes($row['store']) ?>' />
            <p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' />
        </form>

<? 
    } 
    include($documentRoot.'tpl/footer.php');
?>
