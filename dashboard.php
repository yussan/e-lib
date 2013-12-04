<!DOCTYPE html>

<?php
	include "function.php";
	connection();
	session_start();
	//check user account
	
?>

<html lang="en">
	<head>
		<title>E-Libs : Dashboard</title>
		<meta charset="utf-8">		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<link href="css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="img/kiredlogo.png" rel="icon"/>
		<script type="text/javascript">
			//Dashboard
			    //show upload form
			    function show_uploadform() {
			    $("#content_dashboard").load("includes/upload_book.html");
				} 
				//mybook
				//show upload form
			    function show_mybook() {
			    $("#content_dashboard").load("includes/mybook.php");
				} 
				//show borrow book
				function show_myself() {
			    $("#content_dashboard").load("includes/myself.php");
				}
		</script>
	</head>

	<body style="background-color:#000">
		<div style="width:100%; padding:0" class="container-fluid">
		<div class="row-fluid">
			 <div class="span12">
			 	<div id="libheader">
			 		<a href="index.php">
			 		<div class="libheader_img span3">header img</div>
					<div class="libheader_user span3">
						<?php
							if(empty($_SESSION['user'])) {
								//back to home
								header("location: index.php");
							} else {
								user_dashboard();
							}
						?>
					</div>
					</a>
				</div>
			 </div>
		</div>
		  <div class="row-fluid" style="margin-top:5px;width:98%" >
		    <div style="background-color:black; padding:5px" class="span4">
		      <!--menu colapse-->
		      <div class="accordion" id="accordion2">
		      		<!--upload a book-->
				  <div class="accordion-group">
				    <div class="accordion-heading">
				      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
				        <h4>Upload Book</h4>
				      </a>
				    </div>
				    <div id="collapseOne" class="accordion-body collapse in">
				      <div class="accordion-inner">
				        Reading book make you know about world.</br>
				        Creating book make world know about you.</br>
				        <center><button class="btn btn-large btn-primary" type="button" style="border-radius:0" onclick="show_uploadform()">Ready to Upload</button></center>
				      </div>
				    </div>
				  </div>
				  <!--my upload book-->
				  <div class="accordion-group">
				    <div class="accordion-heading">
				      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
				        <h4>My Menus</h4>
				      </a>
				    </div>
				    <div id="collapseTwo" class="accordion-body collapse">
				      <div class="accordion-inner">
				        <ul class="mymenus">
				        	<li class=""><a href="#list_mybook" onclick="show_mybook()">My Book</a></li>
				        	<li class=""><a href="#list_myself" onclick="show_myself()">My Self</a></li>
				        </ul>
				      </div>
				    </div>
				   
				  </div>
				</div>
		      <!---->
		    </div>

		    <!--content-->
		    <div id="content_dashboard" style="background-color:#fff;height:500px; overflow:auto; padding: 10px; border-radius:5px" class="span8" >
		      <!--Body content-->
		      
		    </div>
		  </div>
		</div>

		
		<!--modals-->
		<?php 
			read_TOS(); 
			get_footer();
		?>

		


	<!-- JAVASCRIPTS -->
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>

    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>

    <script src="js/application.js"></script>

	</body>
</html>