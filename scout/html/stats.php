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
<h1>STATS</h1>

<h3>Highest Military Donation</h3>

<?php

// Highest military donation by Angie
	include('dbconnect.php');
	$query = "SELECT product.name as productname, itemordered.quantity AS quantity FROM itemordered INNER JOIN 
	product ON product.product_id = itemordered.productID WHERE product.name LIKE '%donation%' ORDER BY 
	itemordered.quantity DESC LIMIT 1";
	$result = mysqli_query($db, $query) or die("Error Querying Database in highest military donation");
	$row = mysqli_fetch_array ($result);
	$pop = $row[0];
	echo "<p> $pop </p>";
	?>
	
<h3>The Most Popular Item</h3>
<?php
	
	// Here is our most popular order!  - Angie
	$query2 = "select product.name as productname, sum(itemordered.quantity) AS quantity FROM itemordered INNER JOIN
	product ON product.product_id = itemordered.productID GROUP BY productname ORDER BY sum(quantity) DESC LIMIT 1";
	$result2 = mysqli_query($db, $query2) or die ("Error Querying Database in most popular order");
	$row2 = mysqli_fetch_array ($result2);
	$pop = $row2[0];
	echo "<p> $pop </p>";
	
?>
		
<h3>Total Donations to the Military</h3>
<?php

//Ben Tuxbury query to find the total amount donated to the military
	//first total the 50 dollar donations.
			// Use the same thing that would be typed into MySql
//Jim fixed queries after tables were changed to 3nf
	$query = "select SUM(quantity) FROM itemordered INNER JOIN product ON product.product_id = itemordered.productID WHERE name = '50 military donation'";
	
	$result = mysqli_query($db, $query) or die("Error Querying Database in 50 military donation");
			// set it so the row can actually be accessed
	$row = mysqli_fetch_array($result);
			// extract the variable needed
	$mil50 = $row['SUM(quantity)'];
	
	$const50 = 50;
	$sum50s = $mil50 * $const50;
	
	
	
	$query = "select SUM(quantity) FROM itemordered INNER JOIN product ON product.product_id = itemordered.productID WHERE name = '30 military donation'";
	
	$result = mysqli_query($db, $query) or die("Error Querying Database in 30 military donation");
			
	$row = mysqli_fetch_array($result);
			
	$mil30 = $row['SUM(quantity)'];
	
	$const30 = 30;
	$sum30s = $mil30 * $const30;
	$sumTotal = $sum30s + $sum50s;
	
	echo "<p> $$sumTotal </p>";
?>




<h3>Troops participating in Sales</h3>
<?php
	//scout troops participating in popcorn sales by Jim Jewett
	$query = "select troop from scout";
	$result = mysqli_query($db, $query) or die("Error querying database");
	$np ="";
	while ($row = mysqli_fetch_array($result))
{
	$tp = $row[0];
	if ($tp== $np) echo "<p> </p>";
	else echo "<p> $tp </p>";
	$np = $tp;	
}
?>

<h3>Top Scouts</h3>
<?php
	$query = "select name from scout group by name order by count(name) desc";
	$result = mysqli_query($db, $query) or die("Error querying database");
	$wp ="";
	while ($row = mysqli_fetch_array($result))
	{
	$ap = $row[0];
	if ($ap== $wp) echo "<p> </p>";
	else echo "<p> $ap </p>";
	$wp = $ap;	
}
	?>
<h2>Thank you for your generosity!</h2>
</body>
<html>