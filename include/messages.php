<?php
$msg="";
$message="";
if (isset($_GET['msg']))
{
	$message=$_GET['msg'];
}

if($message==1)
	$msg="<p class=\"error\">Invalid User ID or password.</p>";
else if ($message==2)
	$msg="<p class=\"error\">The passwords entered do not match.</p>";
else if ($message==3)
	$msg="<p class=\"message\">Registration successful. Please login below.</p>";
else if ($message==4)
	$msg="<p class=\"message\">Logout successful</p>";
else if ($message==5)
	$msg="<p class=\"error\">Please fill in all fields.</p>";
else if ($message==6)
	$msg="<p class=\"error\">Invalid date entered.</p>";
else if ($message==7)
	$msg="<p class=\"error\">User ID already exists.</p>";
else if ($message==8)
	$msg="<p class=\"error\">You are not logged in.</p>";

?>