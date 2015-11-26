<?php
	session_name("Vaccine");
	session_start();
	if ($_POST['userID']==""||$_POST['pwd1']==""||$_POST['pwd2']==""||$_POST['dob']=="")
	{
		header("Location:../register.php?msg=5");
		exit();
	}

	$user=$_POST['userID'];
	$fName=$_POST['fName'];
	$lName=$_POST['lName'];
	$pwd1=hash('sha256',$_POST['pwd1']);
	$pwd2=hash('sha256',$_POST['pwd2']);
	$dob=$_POST['dob'];
	if($pwd2!=$pwd1)
	{
		header("Location:../register.php?msg=2");
		exit();
	}

	$password=$pwd1;

	if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dob))
	{
		header("Location:../register.php?msg=6");
		exit();
	}

	$fileName='users.xml';
	$xml = simplexml_load_file($fileName);

	foreach ($xml->user as $userid)
	{
		if ($userid->userId==$user)
		{
			header("Location:../register.php?msg=7");
			exit();
		}
	}

	$temp = new SimpleXMLElement($xml->asXML());
	$newItem = $temp->addChild("user");
	$newItem->addChild("userId", $user);
	$newItem->addChild("password", $password);
	$newItem->addChild("fName", $fName);
	$newItem->addChild("lName", $lName);
	$newItem->addChild("dob", $dob);
	$newItem->addChild("shingles", "");
	$newItem->addChild("flu", "");
	$newItem->addChild("tdap", "");
	$newItem->addChild("pcv13", "");
	$newItem->addChild("ppsv23", "");
	$newItem->addChild("menin", "");
	$newItem->addChild("hib", "");
	$temp->asXML($fileName);

	header("Location:../login.php?msg=3");

?>
