<?php
	//database connection
	connection();

	//show user box
	function show_user() {
		echo '<div style="background-color:#000;width:100%;height:100%;padding:5px; border-radius:5px">';
		echo '<img class="user_picture" src="';
		get_profilepicture();
		echo '"/>';
		echo '<a href="dashboard.php">'.$_SESSION['user']['username'].' Dashboard</a> <br/>
		<a href="process.php?action=4">Logout</a>';
		echo '</div>';
		;
	}

	function user_dashboard() {
		echo '<img class="user_picture" src="'; 
		get_profilepicture();
		echo '" />';	
		echo '<a href="index.php">'.$_SESSION['user']['username'].' Home</a> <br/>
		<a href="process.php?action=4">Logout</a>
		';
	}

	//database conection
	function connection() {
		include "connect.php";
	}

	//get picture profile url
	function get_profilepicture(){
		$img_url = $_SESSION['user']['pp_folder'];
		$img_name = $_SESSION['user']['pp_files'];
		echo "$img_url"."$img_name";
	}

	//header
	function get_headerpicture(){

	}

	function get_search() {
		echo '
		<div class="input-append" style="margin:15px 0 0 0">
		<form method="get" action="search.php?search=<?php $search_text ?>">
		  <input style="width:250px" class="span2" id="appendedInputButton" type="text" name="search" placeholder="search book">
		  <button class="btn" type="submit"><i class="icon-search"></i></button>
		  </form>
		</div>
		';
	}

	//home
	function get_home() {
		include "home.php";
	}

	//dashboard
	function read_TOS() {
		echo '
		<div style="color:#000" id="TOS" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">E-Lib | Term and Conditions</h3>
		  </div>
		  <div class="modal-body">';
		   include "includes/TOS.html";
	  echo '</div>
		</div>
		';
	}

	//footer
	function get_footer() {
		echo '
		<div class="row-fluid" style="border-top: #fff solid 1px; margin-top:10px; padding: 10px 0 10px 0 ">
			<div class="span12">
				<center>
			E-Lib by PWL Crew : Yus,Al,Edh,Fat,Fit </br>
			Copyright &copy; 2013
			</center>
			</div>			
		</div>		
		';
	}
?>