<html>
<head>
	<title>Military Donations</title>
<!-- Jim wrote the main file with the insert statements that inserts the information into the mysqldatabase -->
</head>
<body>
<tr>
	<td colspan = "10">
		<a href="index.html" > <img src="images/header.jpg"> </a>
		</td>

<h1>Total Donations to the Military</h1>



<?php

//Ben Tuxbury query to find the total amount donated to the military
	//first total the 50 dollar donations.
	include('dbconnect.php'); 
			// Use the same thing that would be typed into MySql
	$query = "select SUM(quantity) FROM popcorn_sales WHERE product = '50 military donation'";
	
	$result = mysqli_query($db, $query) or die("Error Querying Database");
			// set it so the row can actually be accessed
	$row = mysqli_fetch_array($result);
			// extract the variable needed
	$mil50 = $row['SUM(quantity)'];
	
	$const50 = 50;
	$sum50s = $mil50 * $const50;
	
	
	
	$query = "select SUM(quantity) FROM popcorn_sales WHERE product = '30 dollar miltary donation'";
	
	$result = mysqli_query($db, $query) or die("Error Querying Database");
			
	$row = mysqli_fetch_array($result);
			
	$mil30 = $row['SUM(quantity)'];
	
	$const30 = 30;
	$sum30s = $mil30 * $const30;
	$sumTotal = $sum30s + $sum50s;
	
	echo "<p> $$sumTotal </p>";
	
	// Highest military donation by Angie
	$query = "SELECT product, quantity FROM popcorn_sales WHERE product LIKE '%donation%' ORDER BY quantity
	DESC LIMIT 1";
	$result = mysqli_query($db, $query) or die("Error Querying Database");
	
	// What is this code for? And why is it here? ... It's broken on my computer....Ben
	// It's "working" syntactically but not logically...will work on it later...Angie
	// order by sum quantity desc?....ben
	// I got it!  Here is our most popular order!  - Angie
	$query = "select product, sum(quantity) FROM popcorn_sales GROUP BY product ORDER BY 
		sum(quantity) DESC LIMIT 1";
	$result = mysqli_query($db, $query) or die ("Error Querying Database ");
	$row = mysqli_fetch_array ($result);
	$pop = $row[$result];
	echo "<p> $pop </p>";
	
?>
<h2>Thank you for your generosity</h2>
</body>
<html>