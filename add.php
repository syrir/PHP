<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="n1"; // Table name
$login=$_SESSION['login'];
$txt=$_POST['txt'];
$t=$_POST['temat'];
error_reporting(E_ERROR | E_PARSE);
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$query = "INSERT INTO $tbl_name (temat,notatka,nick) VALUES ('$t','$txt','$login')";

//$sql="INSERT INTO $tbl_name ( nick ,  haslo) VALUES ('$myusername','$mypasswords')";
$result = mysql_query($query);

mysql_close();
header("location:securedpage.php");
?>
