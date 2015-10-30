<?php
    include('../conf.php');
    include($documentRoot.'tpl/header.php');
?>
    <div class="showContent">
       <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" style="padding:0px;">
        <?php echo '<a href="'.$root.'index.php">Zurück zur Übersicht</a>'; ?>
           <?php
            $attId = $_SESSION["id"];
            $abfrage = "SELECT conterId, firstname, surname, email FROM attendants WHERE id LIKE '$attId' LIMIT 1";
            $ergebnis = mysql_query($abfrage);
            $row = mysql_fetch_object($ergebnis);
            $conterMail = $row->email;
            $conterSurname = $row->surname;
            $conterFirstname = $row->firstname;
            $conterId = $row->conterId;
     
            
             ?>
        
            <br><br>
            Dein Opfer:<br>
            <br>
            <b>Name:</b> <? echo utf8_encode($conterFirstname)." ".utf8_encode($conterSurname) ?><br>
            <b>Mail:</b> <? echo utf8_encode($conterMail) ?><br>
        </div>
            <?php
            
     
               // echo $row->noWishes;
            if($conterId != 0) {
             ?>
               
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ownWishes">
                    <div class="ownWishWrap">
                    <h3>Mein Wunschzettel</h3>
                    <p>
                        Du kannst 3 Wünsche äußern, von denen dein Wichtel einen auswählen kann.<br>
                        Deine Wünsche sollten max. 15 € kosten. 
                    </p>
                    <div class="panel-group" id="accordion">
            <?php
                                   
                    $result = mysql_query("SELECT * FROM `wishes` WHERE attendant = ".$conterId) or trigger_error(mysql_error());
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
                                                <div class="wish<?= $i ?>Title"><?=$row['title']?></div>
                                                <b>Kurzbeschreibung:</b><br>
                                                <div class="wish<?= $i ?>Desc"><?=$row['shortDescription']?></div>
                                                <b>Wo zu kaufen? (Laden o. Link):</b><br>
                                                <div class="wish<?= $i ?>Store"><?=$row['store']?></div>
                                                <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
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
                                                <div class="wish<?= $i ?>Title"><?=$row['title']?></div>
                                                <b>Kurzbeschreibung:</b><br>
                                                <div class="wish<?= $i ?>Desc"><?=$row['shortDescription']?></div>
                                                <b>Wo zu kaufen? (Laden o. Link):</b><br>
                                                <div class="wish<?= $i ?>Store"><?=$row['store']?></div>
                                                <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
                                            </form>
                                        </div>
                                    </div>
                                </div>     
                            <?                      
                        }

            }
            else {
                ?>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" style="padding:0px;">
                   <?php echo '<a href="'.$root.'index.php">Zurück zur Übersicht</a>'; ?>
                    <br><br>
                    Die Auslosung hat noch nicht stattgefunden.<br>
                    Du bekommst zeitnah eine Person zugelost und findest hier seine/ihre Wunschliste.
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


