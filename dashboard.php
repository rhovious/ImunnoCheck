<?php
	session_name("Vaccine");
	session_start();
	include_once 'include/info.php';
	include_once 'include/messages.php';
	if (!isset($_SESSION["userID"]))//kicks you out if not logged in
	{
		header('Location: login.php?msg=8');
		exit();
	}
	$tz  = new DateTimeZone('America/Los_Angeles');
	/*
	$curDay=date("d");
	$curMonth=date("m");
	$curYear=date("Y");
	$monDay=date("md");
	*/
	$today=date("Y-m-d");
	$minusOne=date("Y-m-d",strtotime("-1 months"));
	$ageYears = DateTime::createFromFormat('Y-m-d', $DOB, $tz)
	->diff(new DateTime('now', $tz))
	->y;
	if($SHINGLES1Date)
		$ShinglesStatus="ok";
	else if($ageYears<60)
		$ShinglesStatus="unneeded";
	else
		$ShinglesStatus="expired";
	if($tdapDate)
		$tdapStatus="ok";
	else
		$tdapStatus="expired";
	if($pcv13Date)
		$pcv13Status="ok";
	else
		$pcv13Status="expired";
	if($ppsv23Date)
		$ppsv23Status="ok";
	else
		$ppsv23Status="expired";
	if($meninDate)
		$meninStatus="ok";
	else
		$meninStatus="expired";
	if($hibDate)
		$hibStatus="ok";
	else
		$hibStatus="expired";
	if(date('Y-m-d', strtotime('+1 year', strtotime($FLU1Date)))<$today)
		$FluStatus="expired";
	else if(date('Y-m-d', strtotime('11 months', strtotime($FLU1Date)))<$today)
		$FluStatus="expiring-soon";
	else if($FLU1Date)
		$FluStatus="ok";
	else
		$FluStatus="expired";
?>
<!doctype html>
<html>
	<head>
		<title>Imunno&#10004; Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/summary_headers.css">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	</head>
	<body>
		<div id="page-wrapper">
			<h1>Dashboard for <?php echo $fName." ".$lName;?></h1>
			<?php echo $msg?>
			<p><strong>Date of Birth:</strong> <?echo $DOB;?>
				<p><strong>Age: </strong><?echo $ageYears ." years"?>
					<?php if($_SESSION["Editable"]==1)
					{
						echo "<form action=\"include/update.php\" method=\"post\">
							<strong>Update Birthday: </strong>
											<input type=\"date\" name=\"newDOB\" required>
											<input type=\"hidden\" name=\"updatePart\" value=\"1\" required>
										<input type=\"submit\" value=\"Update\">
						</form>";
					}?>
					<hr>
					<h2>Adult Vaccinations</h2>
					<details id="custom-marker-<?php echo"$FluStatus";?>">
					<summary>Flu<div style="float: right">Status: <?php echo"$FluStatus";?></div></summary>
					<table>
						<tr>
							<th scope="row">Last Shot</th>
							<td><?echo $FLU1Date?></td>
							<td>  <?php if($_SESSION["Editable"]==1)
								{
									echo "<form action=\"include/update.php\" method=\"post\">
														<input type=\"date\" name=\"fluDate\" required>
														<input type=\"hidden\" name=\"updatePart\" value=\"2\" required>
													<input type=\"submit\" value=\"Update\">
								</form></td>";}?>
							</tr>
							<th scope="row">Next Shot</th>
							<td><?echo date('Y-m-d', strtotime('+1 year', strtotime($FLU1Date)) );?></td>
							<td><a href="http://www.google.com/calendar/event?action=TEMPLATE&text=Flu%20Shot&dates=<?echo date('Ymd', strtotime('+1 year', strtotime($FLU1Date)) );?>/<?echo (date('Ymd', strtotime('+1 year', strtotime($FLU1Date)) ))+1;?>">Add Reminder to Google Calendar</a> </td>
						</tr>
					</div>
				</table>
				</details>
				<details id="custom-marker-<?php echo"$tdapStatus";?>">
				<summary>td/Tdap<div style="float: right">Status: <?php echo"$tdapStatus";?></div></summary>
				<table>
					<tr>
						<th scope="row">Dose 1</th>
						<td><?
							if(!$tdapDate&&$_SESSION["Editable"]==1)
							{
							echo " <form action=\"include/update.php\" method=\"post\">
								<td><input type=\"date\" name=\"tdapDate\" required>
									<input type=\"hidden\" name=\"updatePart\" value=\"3\" required>
									<input type=\"submit\" value=\"Update\"></td>
								</form>";
								}
								else
								echo $tdapDate?>
							</td>
						</tr>
					</table>
					</details>
					<details id="custom-marker-<?php echo $ShinglesStatus ;?>">
					<summary>Shingles (60 y/o+)<div style="float: right">Status: <?php echo"$ShinglesStatus";?></div></summary>
					<table>
						<tr>
							<th scope="row">Dose 1</th>
							<td><?
								if(!$SHINGLES1Date&&$_SESSION["Editable"]==1)
								{
								echo " <form action=\"include/update.php\" method=\"post\">
									<td><input type=\"date\" name=\"shingleDate\" required>
										<input type=\"hidden\" name=\"updatePart\" value=\"4\" required>
										<input type=\"submit\" value=\"Update\"></td>
									</form>";
									}
									else
									echo $SHINGLES1Date?>
								</td>
							</tr>
						</table>
						</details>
						<details id="custom-marker-<?php echo"$pcv13Status";?>">
						<summary>Pneumococcal (PCV13)<div style="float: right">Status: <?php echo"$pcv13Status";?></div></summary>
						<table>
							<tr>
								<th scope="row">Dose 1</th>
								<td><?
									if(!$pcv13Date&&$_SESSION["Editable"]==1)
									{
									echo " <form action=\"include/update.php\" method=\"post\">
										<td><input type=\"date\" name=\"pcv13Date\" required>
											<input type=\"hidden\" name=\"updatePart\" value=\"5\" required>
											<input type=\"submit\" value=\"Update\"></td>
										</form>";
										}
										else
										echo $pcv13Date?>
									</td>
								</tr>
							</table>
							</details>
							<details id="custom-marker-<?php echo"$ppsv23Status";?>">
							<summary>Pneumococcal (PPSV23)<div style="float: right">Status: <?php echo"$ppsv23Status";?></div></summary>
							<table>
								<tr>
									<th scope="row">Dose 1</th>
									<td><?
										if(!$ppsv23Date&&$_SESSION["Editable"]==1)
										{
										echo " <form action=\"include/update.php\" method=\"post\">
											<td><input type=\"date\" name=\"ppsv23Date\" required>
												<input type=\"hidden\" name=\"updatePart\" value=\"6\" required>
												<input type=\"submit\" value=\"Update\"></td>
											</form>";
											}
											else
											echo $ppsv23Date?>
										</td>
									</tr>
								</table>
								</details>
								<details id="custom-marker-<?php echo"$meninStatus";?>">
								<summary>Meningococcal<div style="float: right">Status: <?php echo"$meninStatus";?></div></summary>
								<table>
									<tr>
										<th scope="row">Dose 1</th>
										<td><?
											if(!$meninDate&&$_SESSION["Editable"]==1)
											{
											echo " <form action=\"include/update.php\" method=\"post\">
												<td><input type=\"date\" name=\"meninDate\" required>
													<input type=\"hidden\" name=\"updatePart\" value=\"7\" required>
													<input type=\"submit\" value=\"Update\"></td>
												</form>";
												}
												else
												echo $meninDate?>
											</td>
										</tr>
									</table>
									</details>
									<details id="custom-marker-<?php echo"$hibStatus";?>">
									<summary>Haemophilus influenzae type b<div style="float: right">Status: <?php echo"$hibStatus";?></div></summary>
									<table>
										<tr>
											<th scope="row">Dose 1</th>
											<td><?
												if(!$hibDate&&$_SESSION["Editable"]==1)
												{
												echo " <form action=\"include/update.php\" method=\"post\">
													<td><input type=\"date\" name=\"hibDate\" required>
														<input type=\"hidden\" name=\"updatePart\" value=\"8\" required>
														<input type=\"submit\" value=\"Update\"></td>
													</form>";
													}
													else
													echo $hibDate?>
												</td>
											</tr>
										</table>
										</details>
										<?php if($_SESSION["Editable"]==1)
										{
											echo "
										<a href=\"generate_url.php\">Send Link</a><br>
										<a href=\"include/logout.php\">Logout</a>";}?>
									</div>
								</div>
							</body>
						</html>