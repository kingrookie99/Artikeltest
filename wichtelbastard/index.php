<?php
    include('conf.php');
    include('tpl/header.php');
    
    if(isset($_SESSION['admin'])&& $_SESSION['admin']==1)
    {?>
    
        <a href="attendants/list.php">Teilnehmer</a>     
        
    <?php
    }
    else{
        ?>
        
        <a href="#">Gehe zu deinem Profil!</a>
        
        <?
    }
        
   
    
    

    include('tpl/footer.php');
?>
