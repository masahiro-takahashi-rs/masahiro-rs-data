<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
   
<!-- # Copyright 2010 RightScale, Inc. All rights reserved.  -->

   
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>RightScale Unified Test App</title>
    <link rel="stylesheet" type="text/css" href="../style.css" />  
</head>

<body>

<div id="header">
<div id="logo"><img src="../images/logo.png" /></div>
</div>

<div class="code_container">
<div class="code">

<H1>Exec Test</H1>
<?php
$output = shell_exec('hostname');
echo "<H2>$output</H2>";
?>

<H1>haproxy-status</H1>
<h2><a href="/haproxy-status">HAproxy Status</a></h2>

<H1>Database Connection Test</H1>

<?php

include '../config/db.php';

mysql_connect($hostname_DB,$username_DB,$password_DB);
@mysql_select_db($database_DB) or die( "Unable to select database");
$query="SELECT * FROM phptest";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "<b><center> Database($database_DB) Output From Host($hostname_DB)</center></b><br><br>";

$i=0;
while ($i < $num) {

$name=mysql_result($result,$i,0);
$value=mysql_result($result,$i,1);


echo "<b><center>$name:$value</center></b><br><hr><br>";

$i++;
}

echo "<b><center> Starting PHPINFO:</center> </b><hr>";
phpinfo();

?>

</div>
</div>

</body>
</html>
