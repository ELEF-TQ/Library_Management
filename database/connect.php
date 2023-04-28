<?php 
define("MYHOST","localhost"); 
define("MYUSER","root"); 
define("MYPASS","");
$base="librarymanagementdb";
$idcon=@mysql_connect(MYHOST,MYUSER,MYPASS);
$idbase=@mysql_select_db($base);
?>