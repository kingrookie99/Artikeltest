<?php
    include('../tpl/header.php');
    echo '<a class="back" href="list.php">Zurück zur Liste</a>';
    include('../conf.php');
    if (isset($_GET['id']) ) {
        $id = (int) $_GET['id'];
        if (isset($_POST['submitted'])) {
            foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
            $sql = "UPDATE `wishes` SET  `title` =  '{$_POST['title']}' ,  `shortDescription` =  '{$_POST['shortDescription']}'  WHERE `id` = '$id' ";
            mysql_query($sql) or die(mysql_error());
            echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
            echo "<a href='list.php'>Back To Listing</a>";
        }
        $row = mysql_fetch_array ( mysql_query("SELECT * FROM `wishes` WHERE `id` = '$id' "));
        
?>

        <form action='' method='POST'>
            <p><b>Titel:</b><br /><input type='text' name='title' value='<?= stripslashes($row['title']) ?>' />
            <p><b>Kurzbeschreibung:</b><br /><input type='text' name='shortDescription' value='<?= stripslashes($row['shortDescription']) ?>' />
            <p><b>Wo zu kaufen? (Link o. Laden):</b><br /><input type='text' name='store' value='<?= stripslashes($row['store']) ?>' />
            <p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' />
        </form>

<? 
    } 
    include('../tpl/footer.php');
?>