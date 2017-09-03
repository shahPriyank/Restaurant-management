<?php
session_start();
?>

<html>

<head>
	<title>Restaurant</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>table.imagetable {
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
#aab{
	background-color: #FFFFC2;
	color: #140A00;
	width: 350px;
	text-align: center;
	margin-left: -75px;
	margin-bottom: 20px;
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

</style>
<script type="text/javascript">
	function abc(){
	document.getElementById('passwordPlain').style.display = "inline";
	document.getElementById('password').style.display = "none";
}
	

function swapPasswordBoxes(funcType) {
	if(funcType == "click") {	
		document.getElementById('passwordPlain').style.display = "none";
		document.getElementById('password').style.display = "inline";
		document.getElementById('password').focus();
	} else {
		if(document.getElementById('password').value.length == 0) {
			document.getElementById('passwordPlain').style.display = "inline";
			document.getElementById('password').style.display = "none";
		}
	}
}

</script>
</head>
<body onload="abc()">
	<div id="header"> <!-- start of header -->
		  
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
<div id="reg">	
		<form id="form1" action="man_index.php" method="post">
		<?php
if(!isset($_POST['submit1']))
	{
		?>	<div id="aab"><p>Enter Login Details:</p></div><br>
			<span class="fontawesome-user"></span>
			<input type="text" name="username" value="Username" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "/> 		
			<span class="fontawesome-lock"></span>
			<input type="text" name="passwordPlain" id="passwordPlain" value="Password" onfocus="swapPasswordBoxes('click')" style="display:none;" />
			<input type="password" name="pass" id="password" value="" onblur="swapPasswordBoxes('blur')" />
			<br><br>
			<input type="submit" name="submit1" value="Login" class="button">
		</form>
</div> 
</table>
<?php
}
else
{
mysql_connect("localhost", "root", "S6CRQZPC") or die(mysql_error());
		mysql_select_db("auth");
		$query = "SELECT * FROM manager WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['pass'] . "'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		if(($_POST['username'])=="Username")
		{
			echo "<div id='aab'><a>Enter Username..</a>";
			echo "<br>";
			echo "<a href='man_index.php'>Click Here to Login again</a></div>";
		}	
	else if($count == 1)
		{
			$_SESSION['man_username']=$_POST['username'];
			echo "<meta http-equiv='refresh' content='2;url=mgr.php' />";
	
			
		}
		else
		{
			echo "<div id='aab'><a>Invalid Credentials..</a>";
			echo "<br>";
			echo "<a href='man_index.php'>Click Here to Login again</a></div>";
		}

}
?>
</body>
</html>