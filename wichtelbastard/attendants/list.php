
<?php
   include('../conf.php');
    include($documentRoot.'tpl/header.php');
    echo '<a href="'.$root.'">Zurück zum Start</a> || <a href="'.$root.'/wishes/list.php">Wunsch-Liste</a>';
 
    echo "<table border=1 class='attendants'>";
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
        echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['firstname']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['surname']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['pic']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['password']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['email']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['conterId']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['nonConterId']) . "</td>";
        echo "<td valign='top'>" . nl2br( $row['admin']) . "</td>";
        echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a></td><td><a href=delete.php?id={$row['id']}>Delete</a></td> ";
        echo "</tr>";
    }
    echo "</table>";
    echo "<a href=new.php>New Row</a>";

?>
    <form action='<?= $root.'lib/shuffle.php' ?>' method='POST' name="ajaxform" id="ajaxRandom">
        <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
        <input type="submit" class="generateIt" value="Neue Zuordnung generieren" />
        <div class="generated">gespeichert - Seite wird neu geladen</div>
        <input type='hidden' value='1' name='generated' />
    </form>

<?php
    include($documentRoot.'tpl/footer.php');
?>
