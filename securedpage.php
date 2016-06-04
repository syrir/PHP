<head>
<title>Secured Page</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['login'])) {
header('Location: login.php');
}
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mat"; // Mysql password
$db_name="logowanie"; // Database name
$tbl_name="n1"; // Table name
$login=$_SESSION['login'];
error_reporting(E_ERROR | E_PARSE);
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
//<input type=\"button\" value=\"Dodaj\" id=\"addbutton\" onclick=\"header(\"Location:logout.php\");\"
$query = "SELECT  id_notatki,temat,modification,creation FROM $tbl_name where nick='$login' ";
$result = mysql_query($query);
//<td><a href=\"edit_note\" class=\"button\">Edit</a></td><td><a href=\"delete_note\" class=\"button\">Delete</a></td>
echo ("
        <table>
        <thread>
        <th>Temat</th>
        <th>Last modification</th>
        <th>Created</th>
        <th><a href=\"add_note.php\" class=\"button\">Add</a></th>>
      </tr>
    </thead>
    <tbody>");
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through result
echo "<tr><td>{$row['temat']}</td><td>{$row['modification']}</td><td>{$row['creation']}</td>
<td><a href=\"edit_note.php?data={$row['id_notatki']}\" class=\"button\" >Edit</a></td>
<td><a href=\"delete_note.php?data={$row['id_notatki']} \" class=\"button\">Delete</a></td></tr>";  //$row['index'] the index here is a field name
}

echo "
</tbody>
</table>"; //Close the table in HTML
mysql_close();
?>
<p>This is secured page with session of user: <b><?php echo $_SESSION['login']; ?></b>
<p><a href="logout.php">Logout  </a>
  <a href= "pass.php">Change your password  </a>

</body>

</html>
