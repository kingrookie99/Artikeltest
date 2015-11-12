<?php
if(isset($_SESSION['loggedIn'])) {
    if(isset($_SESSION['admin'])&& $_SESSION['admin']==1)
    {
?>
        <div class="buttonMenuWrap">
            <div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-4 button einzeiler">
                <a href="<?=$root?>attendants/list.php"><button>Admin</button></a>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4 button">
                <a href="<?=$root?>tpl/self.php"><button>Mein <br>Account</button></a>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4 button">
                <a href="<?=$root?>tpl/receiver.php"><button>Mein <br>Empfänger</button></a>
            </div>
            <div style="clear:both;"></div>
        </div>

    <?php
    }
    else{
    ?>
        
        <div class="buttonMenuWrap">
            <div class="col-md-3 col-md-offset-3 col-sm-4 col-sm-offset-2 col-xs-6 button">
                <a href="<?=$root?>tpl/self.php"><button>Mein <br>Account</button></a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 button">
                <a href="<?=$root?>tpl/receiver.php"><button>Mein <br>Empfänger</button></a>
            </div>
            <div style="clear:both;"></div>
        </div>
       
        <?
    }
}
        ?>