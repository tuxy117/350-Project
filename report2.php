<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alien Abductions</title>
<link rel="stylesheet" href="styles.css" type="text/css" />


</head>
<body>
<?php
   include('header.html');
?>


<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
				
					<!-- CONTENT -->
					<h3>Report an Abduction</h3>
					<p>Thanks for reporting an abduction! </p>
					
					<?php
					include('dbconnect.php');
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$month = $_POST['month'];
					$day = $_POST['day'];
					$year = $_POST['year'];
					$city = $_POST['city'];
					$state = $_POST['state'];
					$query = "INSERT INTO abductions (firstname, lastname, city, state) 
						VALUES ('$firstname', '$lastname', '$city', '$state');";
					$result = mysqli_query($db, $query) or die("Error Querying Database");
					mysqli_close($db);
					echo "<p>$firstname $lastname</p>";
					echo "<p>Date: $month $day, $year</p>";
					echo "<p>Location: $city, $state</p>";
					?>
					
					
					
					</form>
					<!-- END CONTENT -->
					
				</div>
				
				<?php
				    include('SIDEnFOOTER.html');
				?>
				   


			</div>
		</div>
	</div>
</div>
</body>
</html>
