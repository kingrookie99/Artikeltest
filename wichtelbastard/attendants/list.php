
<?php
   include('../conf.php');
   ;
    include($documentRoot.'tpl/header.php');
    include($documentRoot.'tpl/tab_menu.php');
    
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1 && $_SESSION['admin'] == '1') {
        echo '<a class="buttonstyle" href="'.$root.'wishes/list.php">Wunsch-Liste</a>';
    
        echo "<table border=1 class='attendants'>";
        echo "<tr style='background:#111;color:#fff;border-top:3px solid #fff'>";
        echo "<td><b>Id</b></td>";
        echo "<td><b>Vorname</b></td>";
        echo "<td><b>Nachname</b></td>";
        echo "<td><b>Bildname</b></td>";
        echo "<td><b>Password</b></td>";
        echo "<td><b>E-Mail</b></td>";
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
        echo "<a class='buttonstyle' href=new.php>New Row</a>";
    
    ?>
        <div class="hiddenPath">Admin</div>
        <form data-action='<?= $root.'lib/shuffle.php' ?>' method='POST' name="ajaxform" id="ajaxRandom" class="adminForm">
            <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
            <input type="submit" class=" buttonstyle generateIt" value="Neue Zuordnung generieren" />
            <div class="generated">gespeichert - Seite wird neu geladen</div>
            <input type='hidden' value='1' name='generated' />
        </form>
    
    
        <a class='buttonstyle' href="<?= $root ?>lib/mail.php" target="_blank">MAIL</a>    
 

<?php
   }



    include($documentRoot.'tpl/footer.php');
?>
