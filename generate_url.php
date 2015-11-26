<?
	session_name("Vaccine");
	session_start();
$token = md5(uniqid(rand(),1));

$file = "/tmp/urls.txt";
if( !($fd = fopen($file,"a")) )
        die("Could not open $file!");

if( !(flock($fd,LOCK_EX)) )
        die("Could not aquire exclusive lock on $file!");

if( !(fwrite($fd,$token."\n")) )
        die("Could not write to $file!");

if( !(flock($fd,LOCK_UN)) )
        die("Could not release lock on $file!");

if( !(fclose($fd)) )
        die("Could not close file pointer for $file!");

$cwd = substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],"/"));
$userId=$_SESSION['userID'];

?>

<!doctype html>
<html>
<head>
<title>Generate URL</title>
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<div id="page-wrapper">

<?php
print "Send the following URL to someone to let them view your data:<br><br>\n";
print "This link can only be viewed once.<br><br>\n";
print "<a href='http://".$_SERVER['HTTP_HOST']. "$cwd/get_file.php?q=$token&u=$userId''>\n";
print "http://".$_SERVER['HTTP_HOST']."/get_file.php?q=$token&u=$userId</a>\n";
?>
<hr>
<a href="dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>