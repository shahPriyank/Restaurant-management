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
	<style type="text/css">
	/*table{
		color: #fff;
	}
.customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%;
    border-collapse: collapse;
}

.customers td, .customers th {
    font-size: 1em;
    border: 3px solid white;
    width: 25%;
    text-align: center;
    
}

.customers th {
    font-size: 1em;
    text-align: center;
    padding-top: 5px;
    padding-bottom: 4px;
    background-color: transparent;
    color: #ffffff;
}
.customers #amount td{
	border: 0;
	
}*/
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
#aaa p{
	color: #FFFFC2;
	font-size:20px;
	background-color: #140A00;
	width: 220px;
	margin-left: 500px;
	margin-bottom: 20px;
	padding: 5px;
	padding-left: 20px;
	padding-right: 10px;
	border-radius: 5px;
	font-family: Baskerville, 'Baskerville Old Face', 'Hoefler Text', Garamond, 'Times New Roman', serif;
	
}
#aab input[type="submit"]{
	margin-left: 570px;
}
	</style>
</head>
<body>
<?php

if(!isset($_POST['submit']))
{
?>
	<div id="header"> <!-- start of header -->
		<a class="bill" href="bill.php">Pay Bill</a>
		<p>|</p>
		<a class="bill" href="user_done.php">Pending Orders</a>
		
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

<form action="review.php" method="post">
<?php
if(!isset($_SESSION['tableno']))
{
	?>
<div id="aaa"><p>Enter table number :<input type="text" name="table_no" size = "1" required></p></div>
<?php
}	
else
{
echo $_SESSION['tableno'];
}
?>		
<table border=0 class="imagetable">
  <tr>
    <th>Item Name</th>
    <th>Price</th>
    <th>Quantity</th>
  </tr>
  <?php
$i=1;

$j=0;
$order_item_no=array();

for($i=1;$i<=100;$i++)
{
if(@$_POST[$i]!="")
{
	
		$order_item_no[$j]=$i;
		$j++;
		?>

<?php
} 
}


for($i=0;$i<$j;$i++)
{
	$query=$dbo->prepare("select * from menu WHERE item_no=$order_item_no[$i] ");
		$result=$query->execute();
		$row=$query->fetch(PDO::FETCH_ASSOC);
	?>
	
<table class="imagetable">
  <tr>
    <td><?php echo $row['item_name']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><input type="number" name="item_no_<?php echo $i; ?>" min="0" max="5"></td>
  </tr>
<?php
}
?>

</table>

<input type="hidden" name="jindex" value="<?php echo $j; ?>">

<?php
for($i=0;$i<=$j;$i++)
{
?>
<input type="hidden" name="<?php echo $i; ?>" value="<?php echo $order_item_no[$i]; ?>">
<?php } ?>
<br>
<div id="aab">
<input type="submit" name="submit" value="Submit" class="button">
</div>
</form>
</table>

<?php
}
else
{
	if(!isset($_SESSION['tableno']))
{
	$_SESSION['tableno']=$_POST['table_no'];
$query_table=$dbo->prepare("update tables set source='images/red.png' WHERE table_no='".$_SESSION['tableno']."'");
$result_image=$query_table->execute();
}
for($i=0;$i<$_REQUEST['jindex'];$i++)
{
	if($_POST['item_no_'.$i]!=0)
		{
			
	$query=$dbo->prepare("select * from menu WHERE item_no=$_REQUEST[$i]");
		$result=$query->execute();
		$row=$query->fetch(PDO::FETCH_ASSOC);
		$insert_query=$dbo -> prepare("insert into order_user values ('".$_SESSION['tableno']."','".$row['item_name']."','".$_POST['item_no_'.$i]."','".$row['price']."','".$row['type']."')");
		$exe=$insert_query->execute();
		$insert_query_chef=$dbo -> prepare("insert into order_chef ( `table_no`, `item_name`, `qty`, `istype`) values ('".$_SESSION['tableno']."','".$row['item_name']."','".$_POST['item_no_'.$i]."','0')");
		$exe1=$insert_query_chef->execute();
		}	


}
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}

?>
</body>
</html>