<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Settings - Smart Aquarium</title>
	 <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet"> 
	 
	 <style>
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
		  -webkit-appearance: none; 
		  margin: 0; 
		}
		input[type=number]
		{
		  -moz-appearance: textfield;
		}
	 </style>
</head>


<body style="text-align: center; font-family: 'EB Garamond', serif; font-size: 50px; background-color: black;">
	
	<?php 
		$myfile = fopen("config.txt", "r") or die("Unable to open file!");
		$day_temp = ltrim(fgets($myfile),"Target_day_temperature=");
		$night_temp = ltrim(fgets($myfile),"Target_night_temperature=");
		$feed_interv = ltrim(fgets($myfile),"Feeding_interv=");
		fclose($myfile);
	

echo<<<END
	<div style="margin: auto; width: 800px; background-color: #3399ff; border-radius: 50px;">
	<h1>Settings</h1>
	<form action="dashboard.php" method="post" style="text-transform: uppercase;"> 
		Target day temperature.<br />
		<input type="number" min="19" max="31" value=$day_temp name="day_temperature" Maxlength="2" style="height: 70px; font-size: 60px; border-radius: 20px; text-align: center; width: 100px;" />
			<br /><br />
		Target night temperature.<br />
		<input type="number" min="19" max="31" value=$night_temp name="night_temperature" maxlength="2" style="height: 70px; font-size: 60px; border-radius: 20px; text-align: center; width: 100px;" />
			<br /><br />
		How often to feed your fishes?<br />
		<input type="number" min="0" max="99" value=$feed_interv name="feeding_interval" maxlength="2" style="height: 70px; font-size: 60px; border-radius: 20px; text-align: center; width: 100px;"/>
			<br /><br />
		Feed your fishes now.<br />
		<input type="checkbox" value="test" name="feed" style="height: 80px; font-size: 50px; border-radius: 20px; text-align: center; width: 400px; margin: 30px;"/>
		<input type="submit" value="Save settings" style="height: 80px; font-size: 50px; border-radius: 20px; text-align: center; width: 400px; margin: 30px;"/>
	</form>
	</div>
END;
?>
</body>
</html>