<?php
    include('../conf.php');
    include('../tpl/header.php');
    if (isset($_POST['submitted'])) {
        foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
        $sql = "INSERT INTO `wishes` ( `title` ,  `shortDescription`  ) VALUES(  '{$_POST['title']}' ,  '{$_POST['shortDescription']}'  ) ";
        mysql_query($sql) or die(mysql_error());
        echo "Added row.<br />";
        echo "<a href='list.php'>Back To Listing</a>";
    }

?>

<form action='' method='POST'>
    <p><b>Titel:</b><br /><input type='text' name='title'/>
    <p><b>Kurzbeschreibung:</b><br /><input type='text' name='shortDescription'/>
    <p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' />
</form>


<?
    include('../tpl/footer.php');
?>