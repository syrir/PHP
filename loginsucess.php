<?php
session_start();
if(isset($_SESSION['login'])){
header("location:securedpage.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>
