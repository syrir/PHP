<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="uzytkownicy"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['login'];
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypasswords=md5($mypassword);
$sql="INSERT INTO $tbl_name ( nick ,  haslo) VALUES ('$myusername','$mypasswords')";
try {
  if(!mysql_query( $sql ))
  {
      echo("Error inserting data to the table\nquery:$sql");
      //header("location:register.php");
  }
  else {
    header("location:login.php");}
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }


?>
