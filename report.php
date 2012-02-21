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
					<p>Welcome to the Alien Abduction Research Center of the University of Mary Washington. Here is where you can report your alien abduction.</p>
				
					<form method = "post" action = "report2.php">
					<table>
					<tr><td>First Name</td><td><input type="text" id="firstname" name="firstname" /></td></tr>
					<tr><td>Last Name</td><td><input type="text" id="lastname" name="lastname" /></td></tr>
					<tr><td>Address</td><td><input type="text" id="address" name="address" /></td></tr>
					<tr><td>Phone Number</td><td><input type="text" id="phonenumber" name="phonenumber" /></td></tr>

					<tr><td>Date Abducted</td>

					<td><select name="month">	
					<option>January</option>
					<option>February</option>
					<option>March</option>
					<option>April</option>
					<option>May</option>
					<option>June</option>
					<option>July</option>
					<option>August</option>
					<option>September</option>
					<option>October</option>
					<option>November</option>
					<option>December</option>
					</select></td>

					<td><select name="day">
					<option>01</option>
					<option>02</option>
					<option>03</option>
					<option>04</option>
					<option>05</option>
					<option>06</option>
					<option>07</option>
					<option>08</option>
					<option>09</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>
					<option>14</option>
					<option>15</option>
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>
					<option>25</option>
					<option>26</option>
					<option>27</option>
					<option>28</option>
					<option>29</option>
					<option>30</option>
					<option>31</option>
					</select></td>

					<td><select name="year">
					<option>2011</option>
					<option>2012</option>
					<option>2013</option>
					<option>2014</option>
					</select></td></tr>
					
					<tr><td>Location (city)</td><td><input type="text" name="city" id="city"/>

					<select name="state">
					<option>AL</option>
					<option>AK</option>
					<option>AZ</option>
					<option>AR</option>
					<option>CA</option>
					<option>CO</option>
					<option>CT</option>
					<option>DE</option>
					<option>FL</option>
					<option>GA</option>
					<option>HI</option>
					<option>ID</option>
					<option>IL</option>
					<option>IN</option>
					<option>IA</option>
					<option>KS</option>
					<option>KY</option>
					<option>LA</option>
					<option>MA</option>
					<option>MD</option>
					<option>ME</option>
					<option>MI</option>
					<option>MN</option>
					<option>MO</option>
					<option>MS</option>
					<option>MT</option>
					<option>NC</option>
					<option>ND</option>
					<option>NE</option>
					<option>NH</option>
					<option>NJ</option>
					<option>NM</option>
					<option>NV</option>
					<option>OH</option>
					<option>OK</option>
					<option>OR</option>
					<option>PA</option>
					<option>RI</option>
					<option>SC</option>
					<option>SD</option>
					<option>TN</option>
					<option>TX</option>
					<option>UT</option>
					<option>VA</option>
					<option>VT</option>
					<option>WA</option>
					<option>WI</option>
					<option>WV</option>
					<option>WY</option>
					</select></td></tr>
					
					<tr><td>How Scary?</td><td>not scary <input type="radio" name="scary"/><input type="radio" name="scary"/><input type="radio" name="scary"/><input type="radio" name="scary"/><input type="radio" name="scary"/>scary</td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" value="Report Abduction" /></td></tr>
					</table>
					
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
