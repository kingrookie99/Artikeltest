<?
include('config.php');
if (isset($_GET['id']) ) {
$id = (int) $_GET['id'];
if (isset($_POST['submitted'])) {
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }
$sql = "UPDATE `attendants` SET  `firstname` =  '{$_POST['firstname']}' ,  `surname` =  '{$_POST['surname']}' ,  `pic` =  '{$_POST['pic']}' ,  `password` =  '{$_POST['password']}' ,  `email` =  '{$_POST['email']}' ,  `conterId` =  '{$_POST['conterId']}' ,  `nonConterId` =  '{$_POST['nonConterId']}'   WHERE `id` = '$id' ";
mysql_query($sql) or die(mysql_error());
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
echo "<a href='list.php'>Back To Listing</a>";
}
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `attendants` WHERE `id` = '$id' "));
?>

<form action='' method='POST'>
<p><b>Firstname:</b><br /><input type='text' name='firstname' value='<?= stripslashes($row['firstname']) ?>' />
<p><b>Surname:</b><br /><input type='text' name='surname' value='<?= stripslashes($row['surname']) ?>' />
<p><b>Pic:</b><br /><input type='text' name='pic' value='<?= stripslashes($row['pic']) ?>' />
<p><b>Password:</b><br /><input type='text' name='password' value='<?= stripslashes($row['password']) ?>' />
<p><b>Email:</b><br /><input type='text' name='email' value='<?= stripslashes($row['email']) ?>' />
<p><b>ConterId:</b><br /><input type='text' name='conterId' value='<?= stripslashes($row['conterId']) ?>' />
<p><b>NonConterId:</b><br /><input type='text' name='nonConterId' value='<?= stripslashes($row['nonConterId']) ?>' />
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' />
</form>
<? } ?>
