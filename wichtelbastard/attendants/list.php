
<?php
    include('../tpl/header.php');
    echo '<a href="../index.php">Zurück zum Start</a> || <a href="../wishes/list.php">Wunsch-Liste</a>';
    include('../conf.php');
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
    echo "<td><b>Admin</b></td>";
    echo "<td></td><td></td>";
    echo "</tr>";

    $result = mysql_query("SELECT * FROM `attendants`") or trigger_error(mysql_error());
    while($row = mysql_fetch_array($result)){
        foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
        echo "<tr>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['id'])) . "</td>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['firstname'])) . "</td>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['surname'])) . "</td>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['pic'])) . "</td>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['password'])) . "</td>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['email'])) . "</td>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['conterId'])) . "</td>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['nonConterId'])) . "</td>";
        echo "<td valign='top'>" . nl2br( utf8_encode($row['admin'])) . "</td>";
        echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a></td><td><a href=delete.php?id={$row['id']}>Delete</a></td> ";
        echo "</tr>";
    }
    echo "</table>";
    echo "<a href=new.php>New Row</a>";

?>

<?php
    include('../tpl/footer.php');
?>
