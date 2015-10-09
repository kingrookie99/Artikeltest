<a href="../attendants/list.php">Zurück zu den Teilnehmern</a>
<?php
    include('../tpl/header.php');
    include('../conf.php');
    echo "<table border=1 >";
    echo "<tr>";
    echo "<td><b>Id</b></td>";
    echo "<td><b>Titel</b></td>";
    echo "<td><b>Kurzbeschreibung</b></td>";
    echo "</tr>";

    $result = mysql_query("SELECT * FROM `wishes`") or trigger_error(mysql_error());
    while($row = mysql_fetch_array($result)){
        foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
        echo "<tr>";
        echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['title']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['shortDescription']) . "</td>";
        echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a></td><td><a href=delete.php?id={$row['id']}>Delete</a></td> ";
        echo "</tr>";
    }
    echo "</table>";
    echo "<a href=new.php>New Row</a>";
    include('../tpl/footer.php');
?>