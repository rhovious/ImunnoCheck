<?
error_reporting(0);
$token = $_GET['q'];

if( strlen($token)<32 )
{
        include($failFile);
}

$failFile = "include/invalid.php";
$valid = 0;
$file = "/tmp/urls.txt";
$cookie_name = "userID";

$lines = file($file);

if( !($fd = fopen("/tmp/urls.txt","w")) )
        die("Could not open $file for writing!");

if( !(flock($fd,LOCK_EX)) )
        die("Could not aquire exclusive lock on $file!");

for( $i = 0; $lines[$i]; $i++ )
{
        if( $token == rtrim($lines[$i]) )
        {
                $valid = 1;
        }
        else
        {
                fwrite($fd,$lines[$i]);
        }
}

if( !(flock($fd,LOCK_UN)) )
        die("Could not release lock on $file!");

if( !(fclose($fd)) )
        die("Could not close file pointer for $file!");

if( $valid )
{
        session_name("Vaccine");
		session_start();

		$_SESSION["Editable"]=0;
		include 'dashboard.php';
}
else
{
         include($failFile);
}
session_name("Vaccine");
	Session_start();
	Session_destroy();

?>