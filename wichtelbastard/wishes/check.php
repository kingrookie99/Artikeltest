<?php
    include('../conf.php');
    include('../tpl/header.php');
   
        $id = (int) $_POST['attendant'];
            
           
            $sql = "UPDATE `attendants` SET  `noWishes` =  '{$_POST['checkWish']}'   WHERE `id` = '$id' ";

            mysql_query($sql) or die(mysql_error());
            echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
            echo "<a href='list.php'>Back To Listing</a>";
        
        $row = mysql_fetch_array ( mysql_query("SELECT * FROM `attendant` WHERE `id` = '$id' "));

?>
<div class="hiddenPath">Admin</div>
<form action='' method='POST'>
    <p><b>Titel:</b><br /><input type='text' name='title'/>
    <p><b>Kurzbeschreibung:</b><br /><input type='text' name='shortDescription'/>
    <p><b>Laden oder Link:</b><br /><input type='text' name='store'/>
    <p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' />
</form>


<?
    include('../tpl/footer.php');
?>