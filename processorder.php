<html>
<head>
	<title>Pack 207 Trails End - Order Results</title>
</head>
<body>
<h1>Pack 207</h1>
<h2>Order Results</h2>
<?php
	include('dbconnect.php');
	#$db = mysqli_connect('localhost', 'assist', 'assist', 'cub_scout_popcorn_sales');
	#if (mysqli_connect_errno()){
	#echo "error: could not connect";
	#}
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$fdon = $_POST['50don'];
	$ftdon = '50 military donation';
	$a = 50.00;
	$tdon = $_POST['30don'];
	$b = 30;
	
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
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','$ftdon','$fdon','$a')";
	$result = $db->query($query);
	if($result){
	echo $db->affected_rows. "inserted into database";
}else{
	echo "an error has occured";
}
	echo "<p> 50 dollar military donation at quantity $fdon </p>";
	 $a = $a * $fdon;
	}else $a= 0;

	if ($tdon>= "1") 
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','30 dollar miltary donation','$tdon','$b')";
	$result = $db->query($query);
	echo "<p> 30 dollar military donation at quantity $tdon</p>";
	$b = $b * $tdon;
	} else $b = 0;

	
	if ($cheeseqty>= "1")
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','Cheese Lovers Collection','$cheeseqty','$d')";
	$result = $db->query($query);
	 echo "<p> Cheese Lover's Collection at quantity $cheeseqty</p>";
	$d = $d * $cheeseqty;
	}else $d = 0;

	if ($pretzelqty>= "1") 
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','White Chocolatey Pretzels','$pretzelqty','$e')";
	$result = $db->query($query);
	echo "<p> White Chocolatey Pretzels at quantity $pretzelqty</p>";
	$e = $e * $pretzelqty;
	}else $e = 0;

	if ($tripleD>= "1") 
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','Chocolate Triple Delight','$tripleD','$f')";
	$result = $db->query($query);
	echo "<p> Chocolate Triple Delight at quantity $tripleD</p>";
	$f = $f * $tripleD;
	}else $f = 0;

	if ($kettleqty>= "1")
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','18pk Kettle corn','$kettleqty','$g')";
	$result = $db->query($query);
	 echo "<p> 18pk Kettle corn at quantity $kettleqty</p>";
	$g = $g * $kettleqty;
	}else $g = 0;

	if ($Ubutterqty>= "1") 
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','18pk Unbelievable Butter','$Ubutterqty','$h')";
	$result = $db->query($query);
	echo "<p> 18pk Unbelievable Butter at quantity $Ubutterqty</p>";
	$h = $h * $Ubutterqty;
	}else $h = 0;

	if ($butterLqty>= "1")
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','18pk Butter Light','$butterLqty','$i')";
	$result = $db->query($query);
	 echo "<p> 18pk Butter Light at quantity $butterLqty</p>";
	$i = $i * $butterLqty;
	} else $i = 0;
	if ($ccqty>= "1")
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','Caramel Corn alm/cas/pec','$ccqty','$j')";
	$result = $db->query($query);
	 echo "<p> Caramel Corn alm/cas/pec at quantity $ccqty</p>";
	$j = $j * $ccqty;
	} else $j = 0;
	if ($Caramelqty>= "1")
	{
	$query = "insert into popcorn_sales values
			('$firstname','$lastname','Caramel Corn','$Caramelqty','$k')";
	$result = $db->query($query);
	 echo "<p> Caramel Corn at quantity $Caramelqty</p>";
	$k = $k * $Caramelqty;
	} else $k =0;
	$a = $a+$b+$d+$e+$f+$g+$h+$i+$j+$k;
	echo "<p> Your total is $a</p>";
	echo "<p>Order processed at. ";
	echo date('H:i, jS F Y');
	echo "</p>";
?>
</body>
<html>