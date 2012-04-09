<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
   
<!-- # Copyright 2010 RightScale, Inc. All rights reserved.  -->

   
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>RightScale Unified Test App</title>
    <link rel="stylesheet" type="text/css" href="style.css" />  
</head>

<body>

<div id="header">
<div id="logo"><img src="images/logo.png" /></div>
</div>

<div class="code_container">
<div class="code">

<center>
<H1>Exec Test</H1>
<?php
$output = shell_exec('hostname');
echo "<H2>$output</H2>";
?>

<H1>haproxy-status</H1>
<h2><a href="/haproxy-status">HAproxy Status</a></h2>
<H1>Database Connection Test</H1>

<?php
include 'config/db.php';
$table = 'phptest';

$dbhandle = mysql_connect($hostname_DB, $username_DB, $password_DB);
if (!$dbhandle)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($database_DB, $dbhandle);

$result = mysql_query("SELECT * FROM $table");
?>

<table border='1'>
<tr>
<th>ID</th>
<th>Firstname</th>
<th>Lastname</th>
</tr>

<?
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['firstname'] . "</td>";
  echo "<td>" . $row['lastname'] . "</td>";
  echo "</tr>";
  }

echo "</table><br/>";

mysql_close($dbhandle);?>

<form action="insert.php" method="post" style="width:440px;">
<fieldset>
<legend>Add a Record</legend>
ID: <input type="text" name="id"><br>
Firstname: <input type="text" name="firstname"><br>
Lastname: <input type="text" name="lastname"><br>
<input type="Submit">
</fieldset>
</form><br/>


<form action="delete.php" method="post" style="width:440px;">
<fieldset>
<legend>Remove a Record</legend>
ID: <input type="text" name="id"><br><input type="Submit">
</fieldset>
</form>
<br>
<?php
echo "<b><center> Starting PHPINFO:</center> </b><hr>";
phpinfo();
?>
</center>
</div>
</div>

</body>
</html>
