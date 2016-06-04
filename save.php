<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="n1"; // Table name
$login=$_SESSION['login'];
$id=$_POST['var'];
$tm=$_POST['temat'];
$txt=$_POST['txt'];
error_reporting(E_ERROR | E_PARSE);
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$query = "UPDATE $tbl_name SET temat='$tm',notatka='$txt' where id_notatki='$id'";
//$sql="UPDATE $tbl_name SET haslo='$mypasswords' WHERE nick='$myusername'";
$result = mysql_query($query);
mysql_close();
header("location:securedpage.php");


?>
