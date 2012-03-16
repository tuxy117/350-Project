<html>
<head>
	<title>Pack 207 Trails End - Order Results</title>
<!-- Jim wrote the main file with the insert statements that inserts the information into the mysqldatabase -->
</head>
<body>
<h1>Pack 207</h1>
<h2>Order Results</h2>


<?php
	include('dbconnect.php'); # Rebecca's edit
// Rebecca's edit I rearranged some of the code so that the variables are changed before displayed. And I changed a few syntax things.	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$sname=$_POST['sname'];
	$stroop=$_POST['stroop'];
	$fdon = $_POST['50don'];
	$ftdon = '50 military donation';
	$a = 50.00;
	$tdon= '30 dollar miltary donation';
	$tdoncount = $_POST['30don'];	# Rebecca's edit
	$b = 30;
	
	$sweetNsavory= $_POST['sweet'];# Rebecca's edit
	$c= 40;				# Rebecca's edit
	$cheeseqty = $_POST['cheeseqty'];
	$d = 30;
	$pretzelqty = $_POST['pretzelqty'];
	$e = 25;
	$tripleD = $_POST['chocolateTDqty'];
	$f = 20;
	$kettleqty = $_POST['kettleqty'];
	$g = 20;
	$Ubutterqty = $_POST['Ubutterqty'];
	$h = 16;
	$butterLqty = $_POST['butterLqty'];
	$i = 16;
	$ccqty = $_POST['ccqty'];
	$j = 16;
	$Caramelqty = $_POST['Caramelqty'];
	$k = 10;
	
	echo "<p>Thank you $firstname $lastname</p>";
	if ($fdon>= "1") 
	{
	$a = $a * $fdon;
	
	
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','$ftdon','$fdon','$a' )";
	
	$result = mysqli_query($db, $query) or die("Error Querying Database");
	
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query	
					
	echo "<p> 50 dollar military donation at quantity $fdon </p>";
	}
	else{ 
	$a= 0;
	}


	if ($tdoncount>= "1") 
	{
	$b = $b * $tdoncount;
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','$tdon', '$tdoncount','$b')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in 30 dollar donation");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query	
	echo "<p> 30 dollar military donation at quantity $tdoncount </p>";
	}
	else{ 
	$b= 0;
	}
	if ($sweetNsavory>= "1")	# Rebecca's edit I inserted this for James
	{
	$c = $c * $sweetNsavory;	
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','Cheese Lovers Collection','$sweetNsavory','$c')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in Cheese lovers");
	 //Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query	
	echo "<p> Sweet and Savory at quantity $sweetNsavory</p>";
	
	}
	else{ 
	$c= 0;
	}
	if ($cheeseqty>= "1")
	{
	$d = $d * $cheeseqty;	
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','Cheese Lovers Collection','$cheeseqty','$d')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in Cheese lovers");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query	
	echo "<p> Cheese Lover's Collection at quantity $cheeseqty</p>";
	
	}
	else{ 
	$d= 0;
	}
	if ($pretzelqty>= "1") 
	{
	$e = $e * $pretzelqty;
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','White Chocolatey Pretzels','$pretzelqty','$e')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in Chocolate Pretzels");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query
	
	echo "<p> White Chocolatey Pretzels at quantity $pretzelqty</p>";
	
	}
	else{ 
	$e= 0;
	}
	if ($tripleD>= "1") 
	{
	$f = $f * $tripleD;
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','Chocolate Triple Delight','$tripleD','$f')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in Chocolate Triple");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query
	echo "<p> Chocolate Triple Delight at quantity $tripleD</p>";
	
	}
	else{ 
	$f= 0;
	}
	if ($kettleqty>= "1")
	{
	$g = $g * $kettleqty;
	$query = "insert into popcorn_sales(firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','18pk Kettle corn','$kettleqty','$g')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thorwn in 18pk Kettle Corn");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query
	 echo "<p> 18pk Kettle corn at quantity $kettleqty</p>";
	
	}
	else{ 
	$g= 0;
	}
	if ($Ubutterqty>= "1") 
	{
	$h = $h * $Ubutterqty;
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','18pk Unbelievable Butter','$Ubutterqty','$h')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in 18 pk butter lovers");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query
	echo "<p> 18pk Unbelievable Butter at quantity $Ubutterqty</p>";
	
	}
	else{ 
	$h= 0;
	}
	if ($butterLqty>= "1")
	{
	$i = $i * $butterLqty;
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','18pk Butter Light','$butterLqty','$i')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in 18 pk butter light");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query
	 echo "<p> 18pk Butter Light at quantity $butterLqty</p>";
	
	}
	else{ 
	$i= 0;
	} 
	if ($ccqty>= "1")
	{
	$j = $j * $ccqty;
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','Caramel Corn alm/cas/pec','$ccqty','$j')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in Carmel Corn combo");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query
	 echo "<p> Caramel Corn alm/cas/pec at quantity $ccqty</p>";
	
	}
	else{ 
	$j= 0;
	} 
	if ($Caramelqty>= "1")
	{
	$k = $k * $Caramelqty;
	$query = "insert into popcorn_sales (firstname,lastname,product,quantity,price) values
			('$firstname','$lastname','Caramel Corn','$Caramelqty','$k')";
	$result = mysqli_query($db, $query) or die("Error Querying Database thrown in Carmel Corn single");
	//Rebecca Wright's - Inserting the popcorn_sales id into the foreign key in scout.
	$sales_id=mysqli_insert_id($db);
	$query2="INSERT INTO scout (name,sales_id,troop) VALUES ('$sname',$sales_id,'$sTroop');";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part");
	//End of Rebecca's query
	 echo "<p> Caramel Corn at quantity $Caramelqty</p>";
	
	} 
	
	else{
	$k=0;
	}
	
	$a = $a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k;
	echo "<p> Your total is $a</p>";
	echo "<p>Order processed at. ";
	echo date('H:i, jS F Y');
	echo "</p>";


	
?>
</body>
<html>