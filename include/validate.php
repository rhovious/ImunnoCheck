<?php
	session_name("Vaccine");
	session_start();
	$user=$_POST['userID'];

	$password=hash('sha256',$_POST['password']);

	$usersXML="users.xml";
	$xml=simplexml_load_file($usersXML);

	foreach ($xml->user as $user)
	{
		if ($user==$user->userId && $password==$user->password)
		{
			$_SESSION["userID"] = $_POST['userID'];
			$_SESSION["Editable"]=1;
			header('Location: ../dashboard.php');
			break;
		}

	else
		header('Location: ../login.php?msg=1');
}
?>
