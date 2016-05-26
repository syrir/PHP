<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="uzytkownicy"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_SESSION['login'];
$mypassword=$_POST['password'];


$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypasswords=md5($mypassword);
$sql="UPDATE $tbl_name SET haslo='$mypasswords' WHERE nick='$myusername'";



try {
  if(!mysql_query( $sql ))
  {
      echo("Error inserting data to the table\nquery:$sql");
      header("location:pass.php");
  }
  else {

    header("location:logout.php");}
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>
