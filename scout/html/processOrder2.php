<html>
<td colspan = "10">
		<a href="index.html" > <img src="images/header.jpg"> </a>
		</td>
<head>
	<title>Order Results</title>
<!-- Jim wrote the main file with the insert statements that inserts the information into the mysqldatabase -->
</head>
<body>
<h1>Order Results</h1>


<?php
//Made some minor formatting changes throughout- Angie
	include('dbconnect.php'); # Rebecca's edit
// Rebecca's edit I rearranged some of the code so that the variables are changed before displayed. And I changed a few syntax things.	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	if($firstname==" " && $lastname==" "){
	$bname="Anonymous";
	}else
	{
	$bname=$firstname.' '.$lastname; //Rebecca's edit: needed a combined name for the  buyer
	}
	$sname=$_POST['sname'];  //names here caused (didnt match) Ben fixed
	$stroop=$_POST['stroop'];
	$fdon = $_POST['50don'];
	$ftdon = '$50 military donation';
	$a = 50.00;
	$tdon= '$30 military donation';  // Angie updated spelling of "military"
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
	echo "<p>Thank you, $firstname $lastname!</p>";
	if ($fdon>= "1") 
	{
	
	
	//Rebecca Wright's - Inserting into product table.
	$query = "SELECT product_id from product where name='$ftdon';";
    $result = mysqli_query($db, $query) or die("Error Querying Database in 50 donation");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$a = $a * $fdon;		// Gives the total amount
	//Rebecca Wright's - Inserting into item's ordered.
	$query2="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ($orderID,$productID,$fdon,$a)";
	$result3=mysqli_query($db,$query2) or die("Error Querying Database Final Part of 50Don");
	//End of Rebecca's query	
					
	echo "<p> $50 Military Donation - quantity $fdon </p>";
	}
	else{ 
	$a= 0;
	}


	if ($tdoncount>= "1") 
	{
	
	//Rebecca Wright's - Inserting into product table.
	$query = "SELECT product_id from product where name='$tdon';";
	
	$result = mysqli_query($db, $query) or die("Error Querying Database in 30 donation");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$b = $b * $tdoncount;
	//Rebecca Wright's - Inserting into items ordered.
	$query3="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID',$productID,'$tdoncount','$b');";
	$result3=mysqli_query($db,$query3) or die("Error Querying Database Final Part of 30Don");
	//End of Rebecca's query
	//End of Rebecca's query	
	echo "<p> $30 Military Donation - quantity $tdoncount </p>";
	}
	else{ 
	$b= 0;
	}
	if ($sweetNsavory>= "1")	# Rebecca's edit I inserted this for James
	{
	$query = "SELECT product_id from product where name='Sweet and Savory Collection';";
	
	$result = mysqli_query($db, $query) or die("Error Querying Database in sweet");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$c = $c * $sweetNsavory;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID',$productID,'$sweetNsavory','$c');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part sweet");
	//End of Rebecca's query
		

	//End of Rebecca's query	
	echo "<p> Sweet and Savory Collection - quantity $sweetNsavory</p>";
	
	}
	else{ 
	$c= 0;
	}
	if ($cheeseqty>= "1")
	{
		
	$query = "SELECT product_id from product where name='Cheese Lover''s Collection';";
	$result = mysqli_query($db, $query) or die("Error Querying Database in cheese");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$d = $d * $cheeseqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID',$productID,'$cheeseqty','$d');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part cheese");
	echo "<p> Cheese Lover's Collection - quantity $cheeseqty</p>";
	
	}
	else{ 
	$d= 0;
	}
	if ($pretzelqty>= "1") 
	{
	
	$query = "SELECT product_id from product where name='White Chocolatey Pretzels';";
	$result = mysqli_query($db, $query) or die("Error Querying Database in pretezel");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$e = $e * $pretzelqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID',$productID,'$pretzelqty','$e');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part pretzel");
	//End of Rebecca's query
	
	echo "<p> White Chocolatey Pretzels - quantity $pretzelqty</p>";
	
	}
	else{ 
	$e= 0;
	}
	if ($tripleD>= "1") 
	{
	$query = "SELECT product_id from product where name='Chocolate Triple Delight';";
	$result = mysqli_query($db, $query) or die("Error Querying Database in chocolate delight");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$f = $f * $tripleD;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $productID,'$tripleD','$f');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part triple");
	//End of Rebecca's query
	echo "<p> Chocolate Triple Delight - quantity $tripleD</p>";
	
	}
	else{ 
	$f= 0;
	}
	if ($kettleqty>= "1")
	{
	$query = "SELECT product_id from product where name='18pk Kettle Corn';";
	$result = mysqli_query($db, $query) or die("Error Querying Database in kettle");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	
	$g = $g * $kettleqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $productID,'$kettleqty','$f');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part kettle");
	//End of Rebecca's query
	 echo "<p> 18pk Kettle Corn - quantity $kettleqty</p>";
	
	}
	else{ 
	$g= 0;
	}
	if ($Ubutterqty>= "1") 
	{
	$query = "SELECT product_id from product where name='18pk Unbelievable Butter';";
	$result = mysqli_query($db, $query) or die("Error Querying Database in butter");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];

	$h = $h * $Ubutterqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $productID,'$Ubutterqty','$h');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part butter");
	//End of Rebecca's query
	echo "<p> 18pk Unbelievable Butter - quantity $Ubutterqty</p>";
	
	}
	else{ 
	$h= 0;
	}
	if ($butterLqty>= "1")
	{
	
	$query = "SELECT product_id from product where name='18pk Butter Light';";
	$result = mysqli_query($db, $query) or die("Error Querying Database in butterLight");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$i = $i * $butterLqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $productID,'$butterLqty','$i');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part butterLight");
	//End of Rebecca's query
	 echo "<p> 18pk Butter Light - quantity $butterLqty</p>";
	
	}
	else{ 
	$i= 0;
	} 
	if ($ccqty>= "1")
	{
	
	$query = "SELECT product_id from product where name='Caramel Corn alm/cas/pec';";
	$result = mysqli_query($db, $query) or die("Error Querying Database in Popcorn and Nuts");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$j = $j * $ccqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $productID,'$ccqty','$j');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part Popcorn and Nuts");
	//End of Rebecca's query
	 echo "<p> Caramel Corn alm/cas/pec - quantity $ccqty</p>";
	
	}
	else{ 
	$j= 0;
	} 
	if ($Caramelqty>= "1")
	{
	
	$query = "SELECT product_id from product where name='Caramel Corn';";
	$result = mysqli_query($db, $query) or die("Error Querying Database in Caramel");
	$row=mysqli_fetch_array($result);
	$productID=$row['product_id'];
	$k = $k * $Caramelqty;
	//Rebecca Wright's - Inserting into item's ordered.
	
	$query5="INSERT INTO itemordered (orderID,productID,quantity, totalPerItem) VALUES ('$orderID', $productID,'$Caramelqty','$k');";
	$result5=mysqli_query($db,$query5) or die("Error Querying Database Final Part Caramel");
	//End of Rebecca's query
	 echo "<p> Caramel Corn - quantity $Caramelqty</p>";
	
	} 
	
	else{
	$k=0;
	}
	
	
	echo "<p> Your total is $$total.00!</p>";
	
//Jim used the advanced sql query to get the Date and Time and then display them
	$query6 = "SELECT current_date";
	$result6 = mysqli_query($db, $query6) or die("Error Querying Database");
	$row = mysqli_fetch_array ($result6);
	$td = $row[0];
	$query7 = "SELECT current_time";
	$result7 = mysqli_query($db, $query7) or die("Error Querying Database");
	$row2 = mysqli_fetch_array ($result7);
	$tt = $row2[0];
	echo "<p>Order processed on $td at $tt. </p>";
	


	
?>
</body>
<html>