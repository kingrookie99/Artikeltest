<?
include('conf.php');
echo "<table border=1 >";
echo "<tr>";
echo "<td><b>Id</b></td>";
echo "<td><b>Firstname</b></td>";
echo "<td><b>Surname</b></td>";
echo "<td><b>Pic</b></td>";
echo "<td><b>Password</b></td>";
echo "<td><b>Email</b></td>";
echo "<td><b>ConterId</b></td>";
echo "<td><b>NonConterId</b></td>";
echo "</tr>";
$result = mysql_query("SELECT * FROM `attendants`") or trigger_error(mysql_error());
while($row = mysql_fetch_array($result)){
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
echo "<tr>";
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['firstname']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['surname']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['pic']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['password']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['email']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['conterId']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['nonConterId']) . "</td>";
echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a></td><td><a href=delete.php?id={$row['id']}>Delete</a></td> ";
echo "</tr>";
}
echo "</table>";
echo "<a href=new.php>New Row</a>";?>
<div style="width:90%;height:30px;background:#ff0000"></div>
<?php
echo "<table border=1 >";
echo "<tr>";
echo "<td><b>Id</b></td>";
echo "<td><b>Titel</b></td>";
echo "<td><b>Kurzbeschreibung</b></td>";

echo "</tr>";
$result2 = mysql_query("SELECT * FROM `wishes`") or trigger_error(mysql_error());
while($row = mysql_fetch_array($result2)){
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
echo "<tr>";
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['title']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['shortDescription']) . "</td>";
echo "</tr>";
}
echo "</table>";
echo "<a href=new.php>New Row</a>";
?>
