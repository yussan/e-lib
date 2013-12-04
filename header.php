<!DOCTYPE HTML>
<html class="expanded">
	<head>
		<title><?php echo $title ;?></title>
		<meta charset="utf-8">		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link href="css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="img/kiredlogo.png" rel="icon"/>
		
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/modernizr.js"></script>
	
	</head>

	<body>

		<!--header-->
		<div class="row-fluid">
			 <div class="span12">
				<div id="libheader">
					<a href="index.php"><div class="libheader_img span3" >header img</div></a>
					<div class="span3"><?php get_search(); ?></div>
					<div style="border:none" class="libheader_user span3">
					
					<?php

						session_start();
						if(empty($_SESSION['user'])) {
							//back to home

							echo '

							<div class="btn-group">
							  <a class="btn btn-large" href="#login" data-toggle="modal">Login</a>
							  <a class="btn btn-large" href="#register" data-toggle="modal">Register</a>
							</div>
							';

						} else {

							show_user();
						}
					?>
						
						
					</div>
				</div>
			</div>
		</div>