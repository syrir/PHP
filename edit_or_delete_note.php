<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="n1"; // Table name
$login=$_SESSION['login'];
$id=$_POST['id'];
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
//event handlers


if (isset($_POST['edit'])){

  $query = "SELECT * FROM $tbl_name where id_notatki='$id'";
  $result = mysql_query($query);

  if(mysql_num_rows($result))
  {
  $row = mysql_fetch_array($result);
  $_SESSION['temat']=$row['temat'];
  $_SESSION['txt']=$row['notatka'];
  $_SESSION['id']=$id;
  }

  else{
    echo("wrong index");
    header("location:securedpage.php");

  }



}


else
{
  $query = "DELETE FROM $tbl_name where id_notatki='$id'";
  $result = mysql_query($query);
  mysql_close();
  header("location:securedpage.php");
}
 ?>
<form method="POST" action="save.php">
<table class="tab">
<tr><td class="input">Temat</td><td><input type="text" name="temat" value=" <?php  echo (htmlspecialchars($_SESSION['temat']));  ?>" ></td></tr>
<tr><td class="ta">Text:</td><td><input type="text" name="txt" value="<?php echo (htmlspecialchars($_SESSION['txt']));?>" ></td></tr>
<tr><td class="but"><input type="submit" value="Save"><br></td></tr>
</table>
</form>
