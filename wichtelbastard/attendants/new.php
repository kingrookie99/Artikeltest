<?php
    include('../conf.php');
    include($documentRoot.'tpl/header.php');
    include($documentRoot.'tpl/tab_menu.php');
    echo '<a class="back" href="list.php">Back to listing</a>';
    if (isset($_POST['submitted'])) {
        foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
        $sql = "INSERT INTO `attendants` ( `firstname` ,  `surname` ,  `pic` ,  `password` ,  `email` ,  `conterId` ,  `nonConterId`  ) VALUES(  '{$_POST['firstname']}' ,  '{$_POST['surname']}' ,  '{$_POST['pic']}' ,  '{$_POST['password']}' ,  '{$_POST['email']}' ,  '{$_POST['conterId']}' ,  '{$_POST['nonConterId']}'  ) ";
        mysql_query($sql) or die(mysql_error());
        echo "Added row.<br />";
        echo "<a href='list.php'>Back To Listing</a>";
    }

?>
<div class="hiddenPath">Admin</div>
<form action='' method='POST' class="adminForm">
    <p><b>Firstname:</b><br /><input type='text' name='firstname'/>
    <p><b>Surname:</b><br /><input type='text' name='surname'/>
    <p><b>Pic:</b><br /><input type='text' name='pic'/>
    <p><b>Password:</b><br /><input type='text' name='password'/>
    <p><b>Email:</b><br /><input type='text' name='email'/>
    <p><b>ConterId:</b><br /><input type='text' name='conterId'/>
    <p><b>NonConterId:</b><br /><input type='text' name='nonConterId'/>
    <p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' />
</form>


<?
    include('../tpl/footer.php');
?>