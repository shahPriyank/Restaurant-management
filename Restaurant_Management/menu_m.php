<?php
session_start();
?>
<html>
<?php
  $dbhost_name = "localhost"; // Your host name 
$database = "auth";       // Your database name
$username = "root";            // Your login userid 
$password = "S6CRQZPC";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
} // Your Database details 
?>
<head>
	<title>Restaurant</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>

	<div id="header"> <!-- start of header -->
		<a class="bill" href="bill.php">Pay Bill</a>
		<p>|</p>
		<a class="bill" href="user_done.php">Pending Orders</a>
		<ul id="infos">
			<li class="home"> 
				<a href="index.php">HOME</a> 
			</li>
			<li class="phone">
				<a href="#">NUMBER</a> 
			</li>
			<br><br>
			<li class="address">
				<a href="#">ADDRESS</a> 
			</li>
		</ul>
		<a href="index.html" id="logo"></a>
	<!--	<a href="menu.html" class="tagline"></a> -->
	 <!-- end of header -->
		<ul id="navigation">
			<li><a href="menu_s.php"><span>{  Starters  }</span></a></li>
			<li class="main current"><a href="menu_m.php"><span>{  Main Course  }</span></a></li>
			<li><a href="menu_de.php"><span>{  Desserts  }</span></a></li>
			<li><a href="menu_dr.php"><span>{  Drinks  }</span></a></li>
			
		</ul> <!-- /#navigation -->
	</div> <!-- end of header -->
	<?php
		$query=$dbo->prepare("select * from menu WHERE type='mc' ");
		$result=$query->execute();
	?> 

<div id="contents"> <!-- start of contents --> 
<!--<h2 class="main-course"><span>Main Course</span></h2>-->
<div id="menus">
<table id="menutable">
	<form action="review.php" method="post">
		<?php
			while($row=$query->fetch(PDO::FETCH_ASSOC))
			{

		?>
		
		<tr>
			<td><a style="padding-left:10px;"><input type="checkbox" name="<?php echo $row['item_no']; ?>" value="<?php echo $row['item_no']; ?>"></a></td>
			<td width="200px"><p style="color:black;font-size:18px;padding-left:10px;"><?php echo $row['item_name']; ?></p><p style="color:black;font-size:15px;font-weight:normal;padding-left:10px;"><?php echo $row['description']; ?></p></td>
			<td><p style="color:black;font-size:15px;font-family:Trebuchet MS, Helvetica, sans-serif;padding-right:10px;padding-top:0px;"><?php echo $row['price']; ?></p></td>
		<?php $row=$query->fetch(PDO::FETCH_ASSOC); ?>
			<td><a style="padding-left:10px;"><input type="checkbox" name="<?php echo $row['item_no']; ?>" value="<?php echo $row['item_no']; ?>"></a></td>
			<td width="200px"><p style="color:black;font-size:18px;padding-left:10px;"><?php echo $row['item_name']; ?></p><p style="color:black;font-size:15px;font-weight:normal;padding-left:10px;"><?php echo $row['description']; ?></p></td>
			<td><p style="color:black;font-size:15px;font-family:Trebuchet MS, Helvetica, sans-serif;padding-right:10px;padding-top:0px;"><?php echo $row['price']; ?></p></td>
		<?php $row=$query->fetch(PDO::FETCH_ASSOC); ?>
			<td><a style="padding-left:10px;"><input type="checkbox" name="<?php echo $row['item_no']; ?>" value="<?php echo $row['item_no']; ?>"></a></td>
			<td width="200px"><p style="color:black;font-size:18px;padding-left:10px;"><?php echo $row['item_name']; ?></p><p style="color:black;font-size:15px;font-weight:normal;padding-left:10px;"><?php echo $row['description']; ?></p></td>
			<td><p style="color:black;font-size:15px;font-family:Trebuchet MS, Helvetica, sans-serif;padding-right:10px;padding-top:0px;"><?php echo $row['price']; ?></p></td>
		</tr>
		<?php
}
?>
		
	</div>
</div>


</table>

<br><input type="submit" name="review" value="Review" class="button">
</form>
</body>
</html>