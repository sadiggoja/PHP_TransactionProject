<?php

$host='mysql-goja.alwaysdata.net';
$user='goja';
$passwd='31292467441898';
$bd='goja_a';
$mysql = new mysqli($host,$user,$passwd,$bd) or die("error");;
$mysql -> connect_errno;
$mysql-> connect_error;
 mysqli_set_charset($mysql,"utf8");  ?>