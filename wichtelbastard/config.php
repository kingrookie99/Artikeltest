<?php

// connect to db
$link = mysql_connect('91.250.67.127', 'db11143180-wb', '45!wrQwaf7');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('db11143180-wb') ) {
    die ('Can\'t use foo : ' . mysql_error());
}

 ?>
