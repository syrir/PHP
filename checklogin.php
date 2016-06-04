<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="uzytkownicy"; // Table name

// Connect to server and select databse.+
error_reporting(E_ERROR | E_PARSE);
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
$sql="SELECT * FROM $tbl_name WHERE nick='$myusername' and haslo='$mypasswords'";

$result=mysql_query($sql);
$count=mysql_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$_SESSION["login"]=$myusername;
$_SESSION["pass"]=$mypasswords;
header("location:loginsucess.php");
}
else {
echo "Wrong Username or Password";
}
mysql_close();
?>
