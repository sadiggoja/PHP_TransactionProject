<?php

$host='mysql-goja.alwaysdata.net';
$user='goja';
$passwd='******';
$bd='goja_a';
$mysql = new mysqli($host,$user,$passwd,$bd) or die("error");;
$mysql -> connect_errno;
$mysql-> connect_error;
 mysqli_set_charset($mysql,"utf8");  ?>
