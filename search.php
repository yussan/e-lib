<?php
	//get keyword
	include "function.php";
	connection();
	$keyword = $_GET['search'];
	$title = 'searching : '.$keyword;
	include "header.php";

?>



		<!--login and register form-->
		<div style="color:#000; width:400px;" id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">E-Libs Login</h3>
		  </div>
		  <div class="modal-body">
		   <?php
		   	include "includes/login.html";
		   ?>
		  </div>
		</div>

		<div style="color:#000; width:400px;" id="register" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">E-Libs Register</h3>
		  </div>
		  <div class="modal-body">
		   <?php
		   	include "includes/register.html";
		   ?>
		  </div>
		</div>


			
		<!--end of header-->
		
		<!--book list-->
		<div id="container">
					<section class="section" id="section1" data-section="1" >
						
							<div class="title"><h1 style="margin-left:20px">Searching : <?php echo $keyword; ?></h1></div>
							<div style="width:100%;overflow-x:auto;overflow-y:hidden">
								<div class="book_top" >
									<div class="fluid-row">
									<?php
										//php to read book item on database	
										$sql = mysql_query("SELECT * FROM book WHERE title LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%'");
					
										while($books = mysql_fetch_array($sql)){
											$id = $books['id'];
											$user = $books['user'];
											$date = $books['idate'];
											$cover = $books['cover'];
											$cover_folder = $books['cover_folder'];
											$book_title = $books['title'];
											$book_desc = $books['description'];
											$long_dec = $books['longdesc'];
											$book_cover = "$cover_folder"."$cover";
											$uploadby = $books['user'];
									?>
									<a href="#book-<?php echo $id; ?>" data-toggle="modal">
									  <div class="span4 book_item">
									   	<img style="float:left" src="<?php echo $book_cover;?>" />
									   	<h5 style="margin-bottom:0"><?php echo $book_title;?></h5>
									   	<a href="user.php?user=<?php echo $user ?>"><p style="margin-top:0;margin-bottom:0">Upload by : <?php echo $uploadby; ?></p></a>
									  	<p style="margin-top:10px"><?php echo $book_desc;?></p>									  	
									  </div>
									  </a>
									  <!--modal-->
									  <div id="book-<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="color:#000;">
										  <div class="modal-header">
										    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										    <h3 id="myModalLabel"><?php echo $book_title ?></h3>
										    <p style="margin-top:0; margin-bottom:0">Upload by : <?php echo $uploadby; ?></p>
										    <p style="margin-top:0; margin-bottom:0">Upload date : <?php echo $date; ?></p>
										  </div>
										  <div class="modal-body" style="overflow :auto">
										    <p><?php echo $long_dec ?></p>
										  </div>
										  <div class="modal-footer">
										    <button class="btn" >Borrow</button>
										    <button class="btn btn-primary">Read</button>
										  </div>
									  </div>
									 <?php } ?>
									</div>

																		
								</div>
							</div>
									
					</section><!-- /section -->
				
				
			</div><!-- /container -->

	<!-- JAVASCRIPTS -->
	
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    
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
    <script type="text/javascript" src="js/waypoints.min.js"></script>
	<script type="text/javascript" src="js/jquery.knob.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	
	<script type="text/javascript" src="js/main.js"></script>

	</body>
</html>