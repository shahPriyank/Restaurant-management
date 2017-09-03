<?php
session_start();
?>

<html>

<head>
	<title>Restaurant</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
#aaa{
	background-color: #FFFFC2;
	color: #140A00;
	width: 350px;
	text-align: center;
	margin-left: 475px;
	margin-bottom: 20px;
	padding-bottom: 0px;
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
.blink {
      animation: blink 1s steps(5, start) infinite;
      -webkit-animation: blink 1s steps(5, start) infinite;
      text-decoration: underline;
    }
    @keyframes blink {
      to {
        visibility: hidden;
      }
    }
    @-webkit-keyframes blink {
      to {
        visibility: hidden;
      }
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
		<ul id="navigation">
			<li><a href="menu_s.php"><span>{  Starters }</span></a></li>
			<li><a href="menu_m.php"><span>{  Main Course  }</span></a></li>
			<li><a href="menu_de.php"><span>{  Desserts  }</span></a></li>
			<li><a href="menu_dr.php"><span>{  Drinks  }</span></a></li>
		</ul> <!-- /#navigation -->
	</div> <!-- end of header -->
<?php
if(!isset($_POST['submit1']))
	{
	
echo "<div id='aaa'><a>";echo "Your Generated Bill Amount : <span class='blink'>".$_SESSION['bill'];echo "</span></div></a>";
?>
<div id="reg">	
		<form id="form1" action="man_bill.php" method="post">
			<span class="fontawesome-user"></span>
			<input type="text" name="username" value="Username" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' " required/> 		
			<span class="fontawesome-lock"></span>
			<input type="text" name="passwordPlain" id="passwordPlain" value="Password" onfocus="swapPasswordBoxes('click')" style="display:none;" required/>
			<input type="password" name="pass" id="password" onblur="swapPasswordBoxes('blur')" />
			<br><br>
			<input type="submit" name="submit1" value="Acknowledge" class="button">
		</form>
</div> 
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
			echo "<div id='aaa'><a>Enter Username..</a>";
			echo "<br>";
			echo "<a href='man_bill.php'>Click Here to Login again</a></div>";
		}	
		else if($count == 1)
		{
			echo "<meta http-equiv='refresh' content='2;url=index.php' />";
			$query_insert_bill="insert into calc values ('".$_SESSION['bill']."')";
			$result = mysql_query($query_insert_bill);
			$query_update_source="update tables set source='images/green.jpg' WHERE table_no='".$_SESSION['tableno']."'";
			$result = mysql_query($query_update_source);
			$query_delete_row="delete from order_user WHERE table_no='".$_SESSION['tableno']."'";
			$result = mysql_query($query_delete_row);
			session_destroy();
			
		}
		else 
		{
			echo "<div id='aaa'><a>Invalid Credentials..</a>";
			echo "<br>";
			echo "<a href='man_bill.php'>Click Here to Acknowledge again</a></div>";
		}
}
?>
</body>
</html>