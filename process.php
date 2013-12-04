<?php
	include "function.php";
	connection();
	session_start();

	//////////////////////////////////////////REGISTER///////////////////////////////////////////
	$action = $_GET['action'];
	if($action == 1) {//register process
		//register process start
		
		//get variable
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		//picture profile location
		$error = false;
		$folder = 'images/profile/';
		//required file
		$pp_type = array('png','jpg','jpeg','bmp','JPG');
		//max size
		$pp_max_size = 5000000; //5MB

		//grap the picture
		$pp_name = $_FILES['upload_picture']['name'];
		$pp_size = $_FILES['upload_picture']['size'];

		//looking extention file
		$explode = explode('.', $pp_name);
		$extensi = $explode[count($explode)-1];

		//check filetype is true or not

		if(!in_array($extensi, $pp_type)) {
			$error = true;
			$pesan .= 'tipe gambar yang anda upload tidak sesuai';	
		}
		if($pp_size > $pp_max_size) {
			$error = true;
			$pesan .= 'ukuran gambar yang anda upload terlalu besar';
		} 
		if ($error == true) {
			echo '<div>'.$pesan.'</div>';
		} else {

			//starting upload picture
			if(move_uploaded_file($_FILES['upload_picture']['tmp_name'], $folder.$pp_name)) {
				/*mysql_query('INSERT INTO user(pp_files, pp_folder) VALUES
				("'.$book_name.'","'.$folder.'")');*/
				//query execution
				$sql = "INSERT INTO user VALUES('','$firstname','$lastname','$address','$phone','$email','$username','$password','$pp_name','$folder',1)";
				$query = mysql_query($sql);
				//notifikasi
				echo "<center>Success creating account, you can login now</center>";
				echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
			} else{
				echo "<center>Create account is failed, try againt</center>";
				echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
			}

		}
		//////////////////////////////////////////LOGIN///////////////////////////////////////////
	} else if($action == 2) { //login process
		//login process start
		
		//get variable
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		//query execution
		$sql = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "'";
		$query = mysql_query($sql);
		$data = mysql_fetch_assoc($query);

		//proccess
		if (empty($data)) {
			//balik ke home
			echo "<center>login failed, please try again</center>";
			echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
		} else {
			//save session
			$_SESSION['user'] = $data;
			//ke dashboard
			echo "<center>login success</center>";
			echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
		}

	} else if($action == 3) { //upload book
		//get variable
		$title = $_POST['booktitle'];
		$desc = $_POST['description'];
		$longdesciption = $_POST['longdesciption'];
		$user = $_SESSION['user']['username'];
		//$fk_kategori;
		//$cover;
		$cover_folder = "cover/";
		$book_folder = "books/";
		$eror = false;
		//book recruitment
		$book_type = array('pdf','PDF');
		$book_max_size = 10000000000; //10Mb
		//cover recruitment
		$cover_type = array('png','JPG','jpg','jpeg','bmp');
		$cover_max_size = 500000; //500KB
			//book process
			$book_name = $_FILES['uploaded_book']['name'];
			$book_size = $_FILES['uploaded_book']['size'];

			//cover process
			$cover_name = $_FILES['uploaded_cover']['name'];
			$cover_size = $_FILES['uploaded_cover']['size'];;

			//cek book extention
			$explode_book = explode('.',$book_name);
			$extensi_book = $explode_book[count($explode_book)-1];

			//cek cover extention
			$explode_cover = explode('.', $cover_name);
			$extention_cover = $explode_cover[count($explode_cover)-1];

			//cari kesesuaian book file
			if(!in_array($extensi_book,$book_type)) {
				$eror = true;
				$pesan .= 'your book type is not support';
			}
			if($book_size > $book_max_size) {
				$eror = true;
				$pesan .= 'your book size is too big';
			}
			//cari kesesuaian cover file
			if(!in_array($extention_cover,$cover_type)) {
				$eror = true;
				$pesan .= 'your book type is not support';
			}
			if($cover_size > $cover_max_size) {
				$eror = true;
				$pesan .= 'your book size is too big';
			}
			//jika error
			if($eror == true) {
				// redirect
					echo "<center>Book Upload Failed, try again</center>";
					echo "<meta http-equiv='refresh' content='2;URL=dashboard.php'>";
			} else { //mulai memproses data
				
				if(move_uploaded_file($_FILES['uploaded_book']['tmp_name'],$book_folder.$book_name) && move_uploaded_file($_FILES['uploaded_cover']['tmp_name'],$cover_folder.$cover_name) ){
					$sql = "INSERT INTO book(idate, title, description,longdesc,fk_kategori, user,cover,cover_folder, file, file_folder) VALUES ('".date('Y-m-d')."','".$title."','".$desc."','".$longdesciption."',1,'".$user."','".$cover_name."','".$cover_folder."','".$book_name."','".$book_folder."')";
					mysql_query($sql);
					// redirect
					echo "<center>Book Upload Success</center>";
					echo "<meta http-equiv='refresh' content='2;URL=dashboard.php'>";
				}
			}

		//upload process

	} else if($action==4){ //logout

		// delete
		unset($_SESSION['user']);

		// redirect
		echo "<center>Logout Success</center>";
		echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
		
	} else if($action==5) { //borow book, 1 user for to week
		
		if (empty($_SESSION['user'])){
			echo "<center>can't save, login first</center>";
			echo "<meta http-equiv='refresh' content='2;URL=index.php'>";	
		} else {
		//test apakah user yang sama sudah meminjam buku yang sama
		$user = $_GET['user'];
		$book_id = $_GET['book'];
		$sql = "INSERT INTO user_self(fk_id_user,fk_id_book,date_borrow,date_end) VALUES ('".$user."','".$book_id."',CURDATE(), DATE_ADD(CURDATE(), INTERVAL 2 WEEK) )";
		mysql_query($sql);
		echo "<center>Book saved, you can check in your self</center>";
		echo "<meta http-equiv='refresh' content='2;URL=dashboard.php'>";	
		}
		
	} else if($action==6) { //delete book on myself
		$id = $_GET['book'];
		$sql = "DELETE FROM user_self WHERE fk_id_book = '".$id."' ";
		mysql_query($sql);
		echo "<center>Book deleted</center>";
		echo "<meta http-equiv='refresh' content='2;URL=dashboard.php'>";
	} else {
		echo "bye";
	}


	
?>