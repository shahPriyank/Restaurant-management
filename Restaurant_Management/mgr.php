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
<?php
if(!isset($_SESSION['man_username']))
{
	echo "<meta http-equiv='refresh' content='2;url=man_index.php' />";
}
?>
<head>
	<title>Restaurant</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
#aaa{
	background-color: #FFFFC2;
	color: #140A00;
	width: 350px;
	text-align: center;
	margin-left: 475px;
	margin-bottom: 50px;
	padding-bottom: 10px;
	padding-top: 0px;
	border-radius: 10px 10px 10px 10px;
	opacity:1;
	border-top: 1px solid #828282;
	border-right: 1px solid #000;
	border-bottom: 1px solid #000;
	border-left: 1px solid #000;
	border-radius: 5px 5px 5px 5px;
	box-shadow: 10px 10px 5px rgba(0,0,0,0.5);
	height: 50px;
	font-weight: bold;
	font-size: 1.5em;
}
#tab{
	margin-top: 50px;
	width: 800px;
	margin-left: -180px;
}
#tab tr td div#num{
	height: 20px;
	width: 20px;
	color: #140A00;
	margin-left: -155px;
	position: absolute;
	padding-top: 0px;
	font-weight: bold;
	font-size: 1.3em;
}
	</style>
</head>
<body>

	<div id="header"> <!-- start of header -->
		<a class="bill" href="logout.php">logout</a>
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
		<ul id="navigation">
			<li><a href="menu_s.php"><span>{  Starters }</span></a></li>
			<li><a href="menu_m.php"><span>{  Main Course  }</span></a></li>
			<li><a href="menu_de.php"><span>{  Desserts  }</span></a></li>
			<li><a href="menu_dr.php"><span>{  Drinks  }</span></a></li>
		</ul> <!-- /#navigation -->
	</div> <!-- end of header -->
	<div id="aaa"><p>Tables List</p><div>
	<?php
		$query=$dbo->prepare("select * from tables");
		$result=$query->execute();
		$image =array();
		
	while($row=$query->fetch(PDO::FETCH_ASSOC)){
		$image=$row;
		?>
	<table id="tab">
	
	<tr>
		<td><?php $image = $row['source'];echo "<img src='$image' >";?></td>
		<td><div id ="num"><?php echo $row['table_no'];?></div></td>
	<?php $row=$query->fetch(PDO::FETCH_ASSOC); ?>
		<td><?php $image = $row['source'];echo "<img src='$image' >";?></td>
		<td><div id ="num"><?php echo $row['table_no'];?></div></td>
	<?php $row=$query->fetch(PDO::FETCH_ASSOC); ?>
		<td><?php $image = $row['source'];echo "<img src='$image' >";?></td>
		<td><div id ="num"><?php echo $row['table_no'];?></div></td>
	<?php $row=$query->fetch(PDO::FETCH_ASSOC); ?>
		<td><?php $image = $row['source'];echo "<img src='$image' >";?></td>
		<td><div id ="num"><?php echo $row['table_no'];?><div></td>
	</tr>
	
</table>
	<?php
	}
	?> 
</body>
</html>
	