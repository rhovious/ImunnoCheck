<?php
	session_name("Vaccine");
	if (isset($_GET['u']))//this is used for displaying the info if link is sent
	{
		$_SESSION['userID']=$_GET['u'];
	}

	$usersXML="include/users.xml";
	$xml=simplexml_load_file($usersXML);

	foreach ($xml->user as $user)
	{
		if ($_SESSION['userID']==$user->userId)
		{
			$DOB= trim($user->dob);
			$fName=trim($user->fName);
			$lName=trim($user->lName);
			$SHINGLES1Date=trim($user->shingles);
			$FLU1Date=trim($user->flu);
			$tdapDate=trim($user->tdap);
			$pcv13Date=trim($user->pcv13);
			$ppsv23Date=trim($user->ppsv23);
			$meninDate=trim($user->menin);
			$hibDate=trim($user->hib);
		}
	}
?>
