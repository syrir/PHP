<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="n1"; // Table name
$login=$_SESSION['login'];
error_reporting(E_ERROR | E_PARSE);
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
if(isset($_GET['data']))
  {
    $id=$_GET['data'];
    $query = "DELETE FROM $tbl_name where id_notatki='$id'";
    $result = mysql_query($query);
    mysql_close();
    header("location:securedpage.php");
  }
mysql_close();
?>
