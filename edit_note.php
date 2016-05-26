<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="n1"; // Table name
$login=$_SESSION['login'];
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
if(isset($_GET['data']))
  {
    $id=$_GET['data'];
    $query = "SELECT * FROM $tbl_name where id_notatki='$id'";
    $result = mysql_query($query);

    if(mysql_num_rows($result))
    {
      $row = mysql_fetch_array($result);
    }
  }
mysql_close();
?>
<form method="POST" action="save.php">
<table class="tab">
<tr><td class="input">Temat</td><td><input type="text" name="temat" value=" <?php  echo (htmlspecialchars($row['temat']));  ?>" ></td></tr>
<tr><td class="ta">Text:</td><td><input type="text" name="txt" value="<?php echo (htmlspecialchars($row['notatka']));?>" ></td></tr>
<tr><td class="but"><input type="submit" value="Save"><br></td></tr>
<input type="hidden" name="var" value="<?php echo (htmlspecialchars($id));?>" />
</table>
</form>
