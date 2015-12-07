<?php
    include('conf.php');
	if(isset($_POST['login'])){
		header('Location: '.$root.'tpl/self.php');
	}

		include($documentRoot.'tpl/header.php');
		include($documentRoot.'tpl/tab_menu.php');
		include($documentRoot.'tpl/footer.php');

?>
