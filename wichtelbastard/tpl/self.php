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
            <b>Name:</b> <? echo utf8_encode($_SESSION["firstname"])." ".utf8_encode($_SESSION["surname"]) ?><br>
            <b>Mail:</b> <? echo utf8_encode($_SESSION["email"]) ?><br>
        </div>
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ownWishes">
            <div class="ownWishWrap">
                <h3>Mein Wunschzettel</h3>
                <p>
                    Du kannst 3 Wünsche äußern, von denen dein Wichtel einen auswählen kann.<br>
                    Deine Wünsche sollten max. 15 € kosten. 
                </p>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Wunsch</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                               <b>Titel:</b><br>
                                <input type="text" value="" class="firstWish1"><br>
                                <b>Kurzbeschreibung:</b><br>
                                <input type="text" value="" class="firstWish2"><br>
                                <b>Wo zu kaufen? (Laden o. Link):</b><br>
                                <input type="text" value="" class="firstWish3">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. Wunsch</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <b>Titel:</b><br>
                                <input type="text" value="" class="secondWish1"><br>
                                <b>Kurzbeschreibung:</b><br>
                                <input type="text" value="" class="secondWish2"><br>
                                <b>Wo zu kaufen? (Laden o. Link):</b><br>
                                <input type="text" value="" class="secondWish3">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. Wunsch</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <b>Titel:</b><br>
                                <input type="text" value="" class="thirdWish1"><br>
                                <b>Kurzbeschreibung:</b><br>
                                <input type="text" value="" class="thirdWish2"><br>
                                <b>Wo zu kaufen? (Laden o. Link):</b><br>
                                <input type="text" value="" class="thirdWish3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include($documentRoot.'tpl/footer.php');
?>




