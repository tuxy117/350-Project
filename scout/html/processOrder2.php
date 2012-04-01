<html>
<td colspan = "10">
		<a href="index.html" > <img src="images/header.jpg"> </a>
		</td>
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
	$bname=$firstname.' '.$lastname; //Rebecca's edit: needed a combined name for the  buyer
	echo "<p>$bname</p>";
	$sname=$_POST['sname'];  //names here caused (didnt match) Ben fixed
	$stroop=$_POST['stroop'];
	$fdon = $_POST['50don'];
	$ftdon = '50 military donation';
	$a = 50.00;
	$tdon= '30 military donation';  // Angie updated spelling of "military"
	$tdoncount = $_POST['30don'];	# Rebecca's edit
	$b = 30;
	
	$sweetNsavory= $_POST['sweet'];# Rebecca's edit this is a quantity
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
	//Rebecca's edit: Total needed to be at the top so the order table could be written first since you are first drawing information from it.
	$total=($fdon*$a)+($tdoncount*$b)+($sweetNsavory*$c)+($cheeseqty*$d)+($pretzelqty*$e)+($tripleD*$f)+($kettleqty*$g)+($Ubutterqty*$h)+
	($butterLqty*$i)+($ccqty*$j)+($Caramelqty*$k);
	
	$order="insert into customerOrder(total) values($total);";
	$orderResult=mysqli_query($db,$order) or die("Error saving order");
	$orderID=mysqli_insert_id($db);			//Grabs the order's id number
	$scout="insert into scout(name, Troop) values('$sname','$stroop');";
	$scoutResult=mysqli_query($db,$scout) or die("Error Querying Scout");
	$scoutID=mysqli_insert_id($db);
	$buyer="insert into buyer(name,scoutID,orderNum) values('$bname', '$scoutID', '$orderID');";
	$buyerResult= mysqli_query($db,$buyer) or die("Error Querying Buyer");
	
//Rebecca's overall edit note: Moved the total per item(s) so that they fell within the queries
// this way this initall price is not affected in the product table.	
	echo "<p>Thank you $firstname $lastname</p>";
	if ($fdon>= "1") 
	{
	
	
	//Rebecca Wright's - Inserting into product table.
	$query = "insert into product(name, price) values
			('$ftdon','$a')";
	
	$result = mysqli_query($db, $query) or die("Error Querying Database in 50 donation");
	$fdon_id=mysqli_insert_id($db);
	$a = $a * $fdon;		// Gives the total amount
	//Rebecca Wright's - Inserting into item's ordered.
	$query2="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ($orderID,$fdon_id,$fdon,$a)";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part of 50Don");
	//End of Rebecca's query	
					
	echo "<p> 50 dollar military donation at quantity $fdon </p>";
	}
	else{ 
	$a= 0;
	}


	if ($tdoncount>= "1") 
	{
	
	//Rebecca Wright's - Inserting into product table.
	$query2 = "insert into product(name, price) values
			('$ftdon','$b')";
	
	$result2 = mysqli_query($db, $query2) or die("Error Querying Database in 30 donation");
	$b = $b * $tdoncount;
	//Rebecca Wright's - Inserting into items ordered.
	$tdon_id=mysqli_insert_id($db);
	$query3="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID',$tdon_id,'$tdoncount','$b');";
	$result3=mysqli_query($db,$query3) or die("Error Querying Database Final Part of 30Don");
	//End of Rebecca's query
	//End of Rebecca's query	
	echo "<p> 30 dollar military donation at quantity $tdoncount </p>";
	}
	else{ 
	$b= 0;
	}
	if ($sweetNsavory>= "1")	# Rebecca's edit I inserted this for James
	{
	$query4 = "insert into product(name, price) values
			('Sweet And Savory','$c')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in sweet");
	$sweet_id=mysqli_insert_id($db);
	$c = $c * $sweetNsavory;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID',$sweet_id,'$sweetNsavory','$c');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part sweet");
	//End of Rebecca's query
		

	//End of Rebecca's query	
	echo "<p> Sweet and Savory at quantity $sweetNsavory</p>";
	
	}
	else{ 
	$c= 0;
	}
	if ($cheeseqty>= "1")
	{
		
	$query4 = "insert into product(name, price) values
			('Cheese Lovers Collection','$d')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in cheese");
	$cheese_id=mysqli_insert_id($db);
	$d = $d * $cheeseqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID',$cheese_id,'$cheeseqty','$d');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part cheese");
	echo "<p> Cheese Lover's Collection at quantity $cheeseqty</p>";
	
	}
	else{ 
	$d= 0;
	}
	if ($pretzelqty>= "1") 
	{
	
	$query4 = "insert into product(name, price) values
			('White Chocolatey Pretels','$e')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in pretezel");
	$pretzel_id=mysqli_insert_id($db);
	$e = $e * $pretzelqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID',$pretzel_id,'$pretzelqty','$e');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part pretzel");
	//End of Rebecca's query
	
	echo "<p> White Chocolatey Pretzels at quantity $pretzelqty</p>";
	
	}
	else{ 
	$e= 0;
	}
	if ($tripleD>= "1") 
	{

	$query4 = "insert into product(name, price) values
			('Chocolate Triple Delight','$f')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in triple");
	$triple_id=mysqli_insert_id($db);
	$f = $f * $tripleD;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $triple_id,'$tripleD','$f');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part triple");
	//End of Rebecca's query
	echo "<p> Chocolate Triple Delight at quantity $tripleD</p>";
	
	}
	else{ 
	$f= 0;
	}
	if ($kettleqty>= "1")
	{
	$query4 = "insert into product(name, price) values
			('18pk Kettle Corn','$g')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in kettle");
	$kettle_id=mysqli_insert_id($db);
	$g = $g * $kettleqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $kettle_id,'$kettleqty','$f');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part kettle");
	//End of Rebecca's query
	 echo "<p> 18pk Kettle corn at quantity $kettleqty</p>";
	
	}
	else{ 
	$g= 0;
	}
	if ($Ubutterqty>= "1") 
	{
	
	$query4 = "insert into product(name, price) values
			('18pk Kettle Corn','$h')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in butter");
	$butter_id=mysqli_insert_id($db);
	$h = $h * $Ubutterqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $butter_id,'$Ubutterqty','$h');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part butter");
	//End of Rebecca's query
	echo "<p> 18pk Unbelievable Butter at quantity $Ubutterqty</p>";
	
	}
	else{ 
	$h= 0;
	}
	if ($butterLqty>= "1")
	{
	
	$query4 = "insert into product(name, price) values
			('18pk Kettle Corn','$i')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in butterLight");
	$butterLight_id=mysqli_insert_id($db);
	$i = $i * $butterLqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $butterLight_id,'$butterLqty','$i');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part butterLight");
	//End of Rebecca's query
	 echo "<p> 18pk Butter Light at quantity $butterLqty</p>";
	
	}
	else{ 
	$i= 0;
	} 
	if ($ccqty>= "1")
	{
	
	$query4 = "insert into product(name, price) values
			('18pk Kettle Corn','$j')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in Popcorn and nuts");
	$ccqty_id=mysqli_insert_id($db);
	$j = $j * $ccqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $ccqty_id,'$ccqty','$j');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part Popcorn and Nuts");
	//End of Rebecca's query
	 echo "<p> Caramel Corn alm/cas/pec at quantity $ccqty</p>";
	
	}
	else{ 
	$j= 0;
	} 
	if ($Caramelqty>= "1")
	{
	
	$query4 = "insert into product(name, price) values
			('18pk Kettle Corn','$k')";
	
	$result4 = mysqli_query($db, $query4) or die("Error Querying Database in Caramel");
	$caramel_id=mysqli_insert_id($db);
	$k = $k * $Caramelqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $caramel_id,'$Caramelqty','$k');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part Caramel");
	//End of Rebecca's query
	 echo "<p> Caramel Corn at quantity $Caramelqty</p>";
	
	} 
	
	else{
	$k=0;
	}
	
	
	echo "<p> Your total is $total</p>";
	echo "<p>Order processed at. ";
	echo date('H:i, jS F Y');
	echo "</p>";


	
?>
</body>
<html>