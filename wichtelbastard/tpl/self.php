<?php
    include('../conf.php');
    include($documentRoot.'tpl/header.php');
    
?>
    <div class="showContent">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" style="padding:0px;">
           <?php echo '<a href="'.$root.'index.php">Zurück zur Übersicht</a>'; ?>
            <br><br>
            Dein Profil:<br>
            <br>
            <? $pic = $_SESSION["pic"]; ?>
            <div class="imageWrap">
                <img src="<?= $root ?>img/mitarbeiter/<?= $pic ?>" />
            </div>
            <b>Name:</b> <? echo $_SESSION["firstname"]." ".$_SESSION["surname"] ?><br>
            <b>Mail:</b> <? echo $_SESSION["email"] ?><br>
            <div class="checkWish">
                <form action='<?= $root.'wishes/check.php' ?>' method='POST' name="check" id="check">
                    <div class="option">
                        <input type="checkbox" name="checkWish" class="checkWish" value="1"> <p>Ich möchte keine Wünsche angeben - zufällig etwas geschenkt bekommen</p>
                    </div>
                    <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
                    <input class="checkSubmit" type="submit" name="checkIt" value="speichern" />
                    <div class="checked">gespeichert - Seite wird neu geladen</div>
                </form>
            </div> 
        </div>
        <?php
            $attId = $_SESSION["id"];
            $abfrage = "SELECT noWishes FROM attendants WHERE id LIKE '$attId' LIMIT 1";
            $ergebnis = mysql_query($abfrage);
            $row = mysql_fetch_object($ergebnis);

     
               // echo $row->noWishes;
            if($row->noWishes == 0) {
             
        ?>
        <input type="hidden" class="noWishVal" value="0" />
        
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ownWishes">
            <div class="ownWishWrap">
                <h3>Mein Wunschzettel</h3>
                <p>
                    Du kannst 3 Wünsche äußern, von denen dein Wichtel einen auswählen kann.<br>
                    Deine Wünsche sollten max. 15 € kosten. 
                </p>
                <div class="panel-group" id="accordion">
                    
                        
                        
                        
                        <!--
                        1. Auslesen der bestehenden Wünsche in SQl
                        2. in forech-schleife die Div-Blöcke mit den Inputs anzeigen.
                        3. Wenn weniger als 3 REgebnisse, dann die Differenz in Blöcken ausgeben
            
                        
                              -->        
                                
                                     
                <?php
                                   
                    $result = mysql_query("SELECT * FROM `wishes` WHERE attendant = ".$_SESSION['id']) or trigger_error(mysql_error());
                    $ctWishes = mysql_num_rows($result) ;               
                    $ctMaxWishes = 3;
                    $i = 1;
                        while($row = mysql_fetch_array($result)){
                            ?>
                            
                             <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>"><?= $i ?>. Wunsch (ausgefüllt)</a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?= $i ?>" class="panel-collapse collapse">
                                        <div class="panel-body">

                                            <form action='<?= $root.'wishes/new.php' ?>' method='POST' name="ajaxform" id="ajaxform">
                                               <b>Titel:</b><br>
                                                <input type="text" name="title" value="<?=$row['title']?>" class="wish<?= $i ?>Title"><br>
                                                <b>Kurzbeschreibung:</b><br>
                                                <input type="text" name="shortDescription" value="<?=$row['shortDescription']?>" class="wish<?= $i ?>Desc"><br>
                                                <b>Wo zu kaufen? (Laden o. Link):</b><br>
                                                <input type="text" name="store" value="<?=$row['store']?>" class="wish<?= $i ?>Store" />
                                                <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
                                                <input type="submit" class="submitIt" value="speichern" />
                                                <div class="saved">gespeichert - Seite wird neu geladen</div>
                                                <input type='hidden' value='1' name='update' />
                                                <input type='hidden' value='<?=$row['id']?>' name='id' />
                                                <input type='hidden' value='1' name='submitted' />
                                            </form>
                                            <form action='<?= $root.'wishes/delete.php' ?>' method='POST' name="ajaxform2" id="ajaxform2">
                                                <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
                                                <input type="submit" class="clearIt" value="leeren" />
                                                <div class="cleared">geleert - Seite wird neu geladen</div>
                                                <input type='hidden' value='1' name='deleted' />
                                                <input type='hidden' value='<?=$row['id']?>' name='id' />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        
                            
                            <?
                        $i++;    
                        }
                        for($i;$i<=$ctMaxWishes;$i++)
                        {
                            ?>
                           <div class="panel panel-default neu">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>"><?= $i ?>. Wunsch</a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?= $i ?>" class="panel-collapse collapse">
                                        <div class="panel-body">

                                            <form action='<?= $root.'wishes/new.php' ?>' method='POST' name="ajaxform" id="ajaxform">
                                               <b>Titel:</b><br>
                                                <input type="text" name="title" value="" class="wish<?= $i ?>Title"><br>
                                                <b>Kurzbeschreibung:</b><br>
                                                <input type="text" name="shortDescription" value="" class="wish<?= $i ?>Desc"><br>
                                                <b>Wo zu kaufen? (Laden o. Link):</b><br>
                                                <input type="text" name="store" value="" class="wish<?= $i ?>Store" />
                                                <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
                                                <input type="submit" class="submitIt" value="speichern" />
                                                <div class="saved">gespeichert - Seite wird neu geladen</div>
                                                <input type='hidden' value='0' name='update' />
                                                <input type='hidden' value='1' name='submitted' />
                                            </form>
                                        </div>
                                    </div>
                                </div>     
                            <?                      
                        }

                    
            }
else {
    ?>
    <input type="hidden" class="noWishVal" value="1" />
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 noWishes" style="padding:0px;margin-top:10px;">
        Du möchtest keine Wünsche angeben. Dein Wichtel darf dir ein Geschenk seiner Wahl aussuchen.
    </div>
    <?
}
                                                            
        
          
                    ?>
                    
                     
                </div>
            </div>
        </div>
    </div>
<?php
    include($documentRoot.'tpl/footer.php');
?>




