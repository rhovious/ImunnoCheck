<?php
	session_name("Vaccine");
	session_start();
	include_once "info.php";
	$userFile="users.xml";
	$xml=simplexml_load_file($userFile);
	if($_POST['updatePart']==1)
	{
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["newDOB"]))
		{
			header("Location:../dashboard.php?msg=6");
			exit();
		}
		foreach($xml->user as $user)
		{
			if ($_SESSION['userID']==$user->userId)
			{
			$user->dob=$_POST["newDOB"];
			$xml->asXML($userFile);
			break;
		}
		}
	}
	if($_POST['updatePart']==4)
	{
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["shingleDate"]))
		{
			header("Location:../dashboard.php?msg=6");
			exit();
		}
		foreach($xml->user as $user)
		{
			if ($_SESSION['userID']==$user->userId)
			{
			$user->shingles=$_POST["shingleDate"];
			$xml->asXML($userFile);
			break;
		}
		}
	}
	if($_POST["updatePart"]==2)
	{
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["fluDate"]))
		{
			header("Location:../dashboard.php?msg=6");
			exit();
		}
		foreach($xml->user as $user)
		{
			if ($_SESSION['userID']==$user->userId)
			{
			$user->flu=$_POST["fluDate"];
			$xml->asXML($userFile);
			break;
		}
		}
	}
	if($_POST["updatePart"]==3)
	{
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["tdapDate"]))
		{
			header("Location:../dashboard.php?msg=6");
			exit();
		}
		foreach($xml->user as $user)
		{
			if ($_SESSION['userID']==$user->userId)
			{
			$user->tdap=$_POST["tdapDate"];
			$xml->asXML($userFile);
			break;
		}
		}
	}
	if($_POST['updatePart']==5)
	{
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["pcv13Date"]))
		{
			header("Location:../dashboard.php?msg=6");
			exit();
		}
		foreach($xml->user as $user)
		{
			if ($_SESSION['userID']==$user->userId)
			{
				$user->pcv13=$_POST["pcv13Date"];
				$xml->asXML($userFile);
				break;
			}
		}
	}
	if($_POST['updatePart']==6)
	{
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["ppsv23Date"]))
		{
			header("Location:../dashboard.php?msg=6");
			exit();
		}
		foreach($xml->user as $user)
		{
			if ($_SESSION['userID']==$user->userId)
			{
				$user->ppsv23=$_POST["ppsv23Date"];
				$xml->asXML($userFile);
				break;
			}
		}
	}
	if($_POST['updatePart']==7)
	{
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["meninDate"]))
		{
			header("Location:../dashboard.php?msg=6");
			exit();
		}
		foreach($xml->user as $user)
		{
			if ($_SESSION['userID']==$user->userId)
			{
				$user->menin=$_POST["meninDate"];
				$xml->asXML($userFile);
				break;
			}
		}
	}
	if($_POST['updatePart']==8)
	{
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["hibDate"]))
		{
			header("Location:../dashboard.php?msg=6");
			exit();
		}
		foreach($xml->user as $user)
		{
			if ($_SESSION['userID']==$user->userId)
			{
				$user->hib=$_POST["hibDate"];
				$xml->asXML($userFile);
				break;
			}
		}
	}
	header('Location: ../dashboard.php');
?>