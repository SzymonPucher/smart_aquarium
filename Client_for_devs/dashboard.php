<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Dashboard</title>
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet"> 
</head>

<body style="text-align: center; background-color: black; font-family: 'EB Garamond', serif; font-size: 50px;">

<?php 
	
	
	$myfile = fopen("config.txt", "r") or die("Unable to open file!");
	$day_temp = ltrim(fgets($myfile),"Target_day_temperature=");
	$night_temp = ltrim(fgets($myfile),"Target_night_temperature=");
	$feed_interv = ltrim(fgets($myfile),"Feeding_interv=");
	$feed = ltrim(fgets($myfile),"Now=");
	fclose($myfile);
	
	if(isset($_POST['feed'])) {
		$add_one_feed = 1;
	}
	else {
		$add_one_feed = 0;
	}
	
	if(isset($_POST['day_temperature']) && isset($_POST['night_temperature']) && isset($_POST['day_temperature'])){
		$day_temp = $_POST['day_temperature'];
		$night_temp = $_POST['night_temperature'];
		$feed_interv = $_POST['feeding_interval'];
		$myfile = fopen("config.txt", "w") or die("Unable to open file!");
		$txt = "Target_day_temperature=";
		fwrite($myfile, $txt);
		fwrite($myfile, $day_temp);
		$txt = "\nTarget_night_temperature=";
		fwrite($myfile, $txt);
		fwrite($myfile, $night_temp);
		$txt = "\nFeeding_interv=";
		fwrite($myfile, $txt);
		fwrite($myfile, $feed_interv);
		$txt = "\nNow=";
		$feed = $feed + $add_one_feed;
		fwrite($myfile, $txt);
		fwrite($myfile, $feed);
		fclose($myfile);
	}
	else {
		$myfile = fopen("config.txt", "w") or die("Unable to open file!");
		$txt = "Target_day_temperature=";
		fwrite($myfile, $txt);
		fwrite($myfile, $day_temp);
		$txt = "Target_night_temperature=";
		fwrite($myfile, $txt);
		fwrite($myfile, $night_temp);
		$txt = "Feeding_interv=";
		fwrite($myfile, $txt);
		fwrite($myfile, $feed_interv);
		$txt = "Now=";
		$feed = $feed + $add_one_feed;
		fwrite($myfile, $txt);
		fwrite($myfile, $feed);
		fclose($myfile);
	
		
	}
	
echo<<<END
	<div style="margin: auto; width: 800px; background-color: #3399ff; border-radius: 50px;">
	<h2>Smart aquarium</h2>
	<p>This client was only used for testing when mobile application was still in development.</p>
	<table border="1" cellpadding="30" cellspacing="0" style="margin: auto;">
	<tr>
		<td>Target day temperature</td> <td style="font-size: 70px;">$day_temp</td>
	</tr>
	<tr>
		<td>Target night temperature</td> <td style="font-size: 70px;">$night_temp</td>
	</tr>
	<tr>
		<td>Feeding every</td> <td style="font-size: 50px;">$feed_interv minutes</td>
	</tr>
	</table>
	<br /><a href="settings.php"><button style="height: 80px; font-size: 50px; border-radius: 20px; text-align: center; width: 400px; margin: 20px;">Settings</button></a>
	</div>
END;

?>

</body>
</html>