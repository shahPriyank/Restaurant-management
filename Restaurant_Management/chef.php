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
	<style>
	table.imagetable {
	font-family: verdana,arial,sans-serif;
	font-size:1em;
	border-collapse: collapse;
	width: 80%;
	margin-left:100px;
}
table.imagetable th {
	background-color:#140A00;
	color: #fff;
	border-width: 1px;
	border-bottom: 0px;
	border-top: 0px;
	padding: 8px;
	border-style: solid;
	border-color: #000;
	width: 25%;
}
table.imagetable td {
	background-color: #FFFFC2;
	border-width: 2px;
	padding: 8px;
	border-style: solid;
	border-color: #140A00;
	border-top: 0px;
	width: 25%;
	color: #140A00;
	text-align: center;
}
#aab input[type="submit"]{
	margin-left: 570px;
	margin-top: 20px;
}
	</style>
</head>
<body>

	<div id="header"> <!-- start of header -->
		<ul id="infos">
			<li class="home"> 
				<a href="index.php">HOME</a> 
			</li>
			<li class="phone">
				<a href="contact.html">NUMBER</a> 
			</li>
			<br><br>
			<li class="address">
				<a href="contact.html">ADDRESS</a> 
			</li>
		</ul>
		<a href="index.html" id="logo"></a>
		<ul id="navigation">
			<li><a href="menu_s.php"><span>{  Starters  }</span></a></li>
			<li><a href="menu_m.php"><span>{  Main Course  }</span></a></li>
			<li><a href="menu_de.php"><span>{  Desserts  }</span></a></li>
			<li><a href="menu_dr.php"><span>{  Drinks  }</span></a></li>
		</ul> <!-- /#navigation -->
	</div> <!-- end of header -->
<?php
if(!isset($_POST['submit']))
{
?>
<form action="chef.php" method="post">
<table border=0 class="imagetable">
  <tr>
    <th>Item Name</th>
    <th>Table No.</th>
    <th>Quantity</th>
    <th>Status</th>
   
  </tr>
<?php
$query='select * from order_chef';
foreach($dbo->query($query) as $row)
{
	?>

	<table border=0 class="imagetable">
  <tr>
    <td><?php echo $row['item_name']; ?></td>
  	<td><?php echo $row['table_no']; ?></td>
    <td><?php echo $row['qty'];  ?></td>
  	<td><input type="checkbox" name="<?php echo $row['srno']; ?>" value="Ready"></td>
  </tr>

	</table>


</table>

<?php
}
?>
<div id="aab">
<input type="submit" value="Submit" name="submit" class="button">
</div></form>
<?php
}else
{
$max_query="SELECT MAX(srno) as maxi FROM order_chef";
$max_run=$dbo->prepare($max_query);
$max_result=$max_run->execute();
$max_run1=$max_run->fetch(PDO::FETCH_ASSOC);
$max=$max_run1['maxi'];
$min_query="SELECT MIN(srno) as mini FROM order_chef";
$min_run=$dbo->prepare($min_query);
$min_result=$min_run->execute();
$min_run1=$min_run->fetch(PDO::FETCH_ASSOC);
$min=$min_run1['mini'];

for($i=$min;$i<=$max;$i++)
{
	if(isset($_POST[$i]))
{
	$query_remove=$dbo->prepare("delete from order_chef where srno='".$i."'");
	$remove=$query_remove->execute();

}
}
 echo "<meta http-equiv='refresh' content='2;url=chef.php' />";


}
?>
</body>
</html>