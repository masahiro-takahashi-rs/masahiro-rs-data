<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
   
<!-- # Copyright 2010 RightScale, Inc. All rights reserved.  -->

   
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Insert function</title>
    <link rel="stylesheet" type="text/css" href="style.css" />  
</head>

<body>

<div id="header">
<div id="logo"><img src="images/logo.png" /></div>
</div>

<div class="code_container">
<div class="code">

<center>
<?php
include 'config/db.php';
$table = 'phptest';

$dbhandle = mysql_connect($hostname_DB, $username_DB, $password_DB);
if (!$dbhandle)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($database_DB, $dbhandle);

$sql="INSERT INTO $table (id, firstname, lastname)
VALUES
('$_POST[id]','$_POST[firstname]','$_POST[lastname]')";

if (!mysql_query($sql,$dbhandle))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
echo "<br />";
echo "<a href=\"index.php\">Click here to return to previous page.</a>";

mysql_close($dbhandle);
?>
</div>
</div>

</body>
</html>
