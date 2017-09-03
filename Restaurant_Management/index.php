<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
	
<?php
 
  $dbhost_name = "localhost"; // Your host name 
$database = "auth";       // Your database name
$username = "root";            // Your login userid 
$password ="S6CRQZPC";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!:" . $e->getMessage() . "<br/>";
die();
}  
?>
<head>
	<title>Restaurant</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie7.css">	
	<![endif]-->
	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="css/ie6.css">		
	<![endif]-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="3D Thumbnail Hover Effects" />
        <meta name="keywords" content="3d, 3dtransform, hover, effect, thumbnail, overlay, curved, folded" />
   
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="js/abc.js"></script> 
    <script type="text/javascript" src="js/xyz.js"></script> 
    <script type="text/javascript" src="js/new.js"></script> 


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
  </div> <!-- end of header -->
	
	
		<div class="container">
		<div id="grid" class="main">
        <div class="view">
          <div class="view-back">
            <span>Starters</span>
            <ul>
            	<li>Item 1</li>
            	<li>Item 2</li>
            	<li>Item 3</li>
            </ul>
            <a href="menu_s.php">&rarr;</a>
          </div>
          <img src="images/starters.jpg" />
        </div>
        <div class="view">
          <div class="view-back">
            <span>Main</span>
            <ul>
            	<li>Item 1</li>
            	<li>Item 2</li>
            	<li>Item 3</li>
            </ul>
            <a href="menu_m.php">&rarr;</a>
          </div>
          <img src="images/mainc.jpg" />
        </div>
        <div class="view">
          <div class="view-back">
            <span>Desserts</span>
            <ul>
            	<li>Item 1</li>
            	<li>Item 2</li>
            	<li>Item 3</li>
            </ul>
            <a href="menu_de.php">&rarr;</a>
          </div>
          <img src="images/dessert.jpg" />
        </div>
        <div class="view">
          <div class="view-back">
            <span>Drinks</span>
            <ul>
            	<li>Item 1</li>
            	<li>Item 2</li>
            	<li>Item 3</li>
            </ul>
            <a href="menu_dr.php">&rarr;</a>
          </div>
          <img src="images/drink.jpg" />
        </div>
      </div>
        </div>
    <script type="text/javascript"> 
      
      Modernizr.load({
        test: Modernizr.csstransforms3d && Modernizr.csstransitions,
        yep : ['http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js','js/xyz.js'],
        nope: 'css/fallback.css',
        callback : function( url, result, key ) {
            
          if( url === 'js/xyz.js' ) {
        $( '#grid' ).hoverfold();
          }

        }
      });
        
    </script>

	<div id="footer">  <!--start of footer--> 
		<!--<ul class="advertise">
			<li class="delivery">
				<h2>Hungry? We Deliver</h2>
				<a href="menu.html">Download our Menu</a>
			</li>
			<li class="event">
				<h2>Party! Party!</h2>
				<p>Celebrate your<br> Special Events with Us</p>
			</li>
			<li class="connect">
				<h2>Let's Keep in Touch</h2>
				<a href="http://facebook.com/freewebsitetemplates" target="_blank" class="fb" title="Facebook"></a> 
				<a href="http://twitter.com/fwtemplates" target="_blank" class="twitr" title="Twitter"></a>
			</li>
		</ul>-->
		<div>
			<ul class="navigation">
				<li class="selected"><a href="#">Home</a></li>
				<li><a href="#">Book an event</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">About</a></li>
				<li class="last"><a href="#">Contact</a></li>
			</ul>
			<span>&copy; Copyright 2012. All Rights Reserved.</span>
		</div>
	</div>  <!--end of footer -->
</body>
</html>