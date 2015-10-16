<?php
    include('conf.php');
    include($documentRoot.'tpl/header.php');

    if(isset($_SESSION['loggedIn'])) {
        if(isset($_SESSION['admin'])&& $_SESSION['admin']==1)
        {?>
            
            <div class="col-md-4 col-sm-4 col-xs-12 button">
                <a href="<?=$root?>attendants/list.php"><button>Admin</button></a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 button">
                <a href="<?=$root?>tpl/self.php"><button>Mein Account</button></a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 button">
                <a href="<?=$root?>tpl/receiver.php"><button>Mein Empfänger</button></a>
            </div>

        <?php
        }
        else{
            ?>

            <div class="col-md-6 col-sm-6 col-xs-12 button">
                <button href="<?=$root?>tpl/self.php">Mein Account</button>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 button">
                <button href="<?=$root?>tpl/receiver.php">Mein Empfänger</button>
            </div>

            <?
        }
    }

    include($documentRoot.'tpl/footer.php');
?>
