<?php
    include('../conf.php');
    include($documentRoot.'tpl/header.php');
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    include($documentRoot.'tpl/tab_menu.php');
?>
    <div class="showContent">
       <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 introText">
          <div class="hiddenPath">Mein Empfänger</div>
           <?php
            $attId = $_SESSION["conterId"];
            if($attId != 0) {
                $abfrage = "SELECT conterId, firstname, surname, email, id, pic, noWishes FROM attendants WHERE id LIKE '$attId' LIMIT 1";
                $ergebnis = mysql_query($abfrage);
                $row = mysql_fetch_object($ergebnis);
                $conterId = $row->conterId;
                $conterMail = $row->email;
                $conterSurname = $row->surname;
                $conterFirstname = $row->firstname;
                $id = $row->id;
                $pic = $row->pic;
                $noWishes = $row->noWishes;
            
             ?>
        
            
            <div class="imageWrap">
                <?php 
            		$src = $root."img/mitarbeiter/".$pic;
					if(@getimagesize($src)){
            	?>
                	<img src="<?= $root ?>img/mitarbeiter/<?= $pic ?>" />
                <?php 
					}
					else {
						?>
						<img src="<?= $root ?>img/mitarbeiter/dummy.jpg" />
						<?php
					} 
				?>
            </div>
            <b>Name:</b> <? echo $conterFirstname." ".$conterSurname ?><br>
            <b>Mail:</b> <? echo $conterMail ?><br>
        </div>
               
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 receiverWishes">
                    <div class="receiverWishWrap">
                        <h3>Wunschzettel von  <? echo $conterFirstname." ".$conterSurname ?></h3>
                        <?php
                        if($noWishes == 1) {
                        ?>
                            <p>
                                <? echo $conterFirstname." ".$conterSurname ?> hat angegeben, dass er keine besonderen Wünsche hat. Du darfst ihr/ihm frei nach deinem Willen etwas schenken.
                            </p>
                        <?php
                         }       
                        else {
                        ?>
                        <p>
                            Hier kannst du die 3 Wünsche deines Empfängers sehen.
                        </p>
                        <div class="panel-group" id="accordion">
            <?php
                                   
                    $result = mysql_query("SELECT * FROM `wishes` WHERE attendant = ".$id) or trigger_error(mysql_error());
                    $ctWishes = mysql_num_rows($result) ;               
                    $ctMaxWishes = 3;
                    $i = 1;
                        while($row = mysql_fetch_array($result)){
                            ?>
                            
                             <div class="panel panel-default receiverWish">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>"><?= $i ?>. Wunsch</a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?= $i ?>" class="panel-collapse collapse">
                                        <div class="panel-body rWpanel-body">
                                            <div class="wish<?= $i ?>Title"><?=$row['title']?></div>
                                            <b>Titel</b>
                                            <div class="wish<?= $i ?>Desc"><?=$row['shortDescription']?></div>
                                            <b>Kurzbeschreibung</b>
                                            <div class="wish<?= $i ?>Store"><?=$row['store']?></div>
                                            <b>Wo zu kaufen? (Laden o. Link)</b>
                                            <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            <?
                        $i++;    
                        }
                        for($i;$i<=$ctMaxWishes;$i++)
                        {
                            ?>
                               <div class="panel panel-default receiverWish">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <?= $i ?>. Wunsch (bisher nicht ausgefüllt)
                                        </h4>
                                    </div>
                                    <!--
                                    <div id="collapse<?= $i ?>" class="panel-collapse collapse">
                                        <div class="panel-body rWpanel-body">
                                            <div class="wish<?= $i ?>Title"><?=$row['title']?></div>
                                            <b>Titel</b>
                                            <div class="wish<?= $i ?>Desc"><?=$row['shortDescription']?></div>
                                            <b>Kurzbeschreibung</b>
                                            <div class="wish<?= $i ?>Store"><?=$row['store']?></div>
                                            <b>Wo zu kaufen? (Laden o. Link)</b>
                                            <input type="hidden" name="attendant" value="<?= $_SESSION["id"] ?>" class="wish<?= $i ?>Attendant" />
                                            
                                        </div>
                                    </div>
                                    -->
                                </div>    
                            <?                      
                        }
                    ?>
                    
                        </div>
                        <?
                        }
                        ?>
                   </div>
                </div>
                    
                    <?php
            }
            else {
                ?>
                </div>
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" style="padding-bottom:20px;padding-top:20px;background:#3FB7EF;color:#fff">
              
                    Die Auslosung findet am <b>27.11.2015 um 12.23 Uhr</b> statt.<br>
                    Du bekommst dann per Zufallsmechanismus eine Person zugelost und findest hier ihre/seine Wunschliste.
                </div>
                <?
            }

        
          
                    ?>
                    
                     
                
        </div>
                    
<?php
	}
    include($documentRoot.'tpl/footer.php');
?>


