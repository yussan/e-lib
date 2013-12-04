<?php
include "../function.php";
connection();
session_start();
?>

<?php
//total mybook
$sql = mysql_query("SELECT COUNT(*) as 'total' FROM book WHERE user = '".$_SESSION['user']['username']."'"); 
$total = mysql_fetch_assoc($sql);
?>
<table class="table" style="color:#000; font-weight:none">
<tr>
  <td colspan="7">
    <h1 style="font-weight:bold">My Book : <?php echo $total['total'];?> Books</h1>
  </td> 
</tr>

  <tr>
  	<td>
  		<strong>#</strong>
  	</td>
  	<td>
  		<strong>Title</strong>
  	</td>
  	<td>
  		<strong>Description</strong>
  	</td>
    <td>
      <strong>DateUpload</strong>
    </td>
  	<td></td><td></td>


<?php

$user = $_SESSION['user']['username'];
$sql = mysql_query("SELECT id,idate,title,description,longdesc FROM book where user = '".$user."'");

for ($n=1;$n<51;$n++) {
   while($mybook = mysql_fetch_array($sql)) {
      $id = $mybook['id'];
      $title = $mybook['title'];
      $desc = $mybook['description'];
      $longdesc = $mybook['longdesc'];
      $dateupload = $mybook['idate'];

?>
  </tr>

   <tr>
  	<td>
  		<?echo $n; ?>
  	</td>
  	<td>
  		<?php echo $title;?>
  	</td>
  	<td>
  		<?php echo $desc;?>
  	</td>
    <td>
      <?php echo $dateupload;?>
    </td>
  		<td>
  		<a class="btn btn-mini" type="button"><i class="icon-eye-open" /></a>
  	</td>
    <td>
      <a class="btn btn-mini" href="#mybook_edit_<?php echo $id; ?>" type="button" data-toggle="modal"><i class="icon-pencil" /></a>
    </td>
  	<td>
  		<a href="#mybook_delete_<?php echo $id; ?>" class="btn btn-mini" type="button" data-toggle="modal"><i class="icon-trash"/></a>
  	</td>
  	
  </tr>

  <!--edit modal-->
  <div style="color:black; width : 400px;" id="mybook_edit_<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-body">
        <center>
          <h2 style="color:#000">Elibs - Edit Book</h2>
            <form method="post" enctype="multipart/form-data" action="process.php?action=3">
            <input type="text" name="booktitle" value="<?php echo $title?>"/>
            <input id="disabledInput" type="text" name="author" value="<?php echo $_SESSION['user']['username'];?>"  disabled/>
            <textarea name="description"><?php echo $desc?></textarea>
            <textarea name="longdescription"><?php echo $longdesc?></textarea>
            <select>
              <option>Category</option> 
              <option name="school">school</option>
                <option name="magazine">magazine</option>
                <option name="cooking">cooking</option>
                <option name="technology">sport</option>
                <option name="automotive">science</option>
                <option name="automotive">science</option>
            </select>
            <label class="checkbox">
                <input type="checkbox">I agree <a href="#TOS" data-toggle="modal">terms and condition</a>
              </label>
            <button name="btn_uploadbook" style="width:100px; border-radius:0" class="btn btn-large btn-primary" type="submit" style="border-radius:0" onclick="show_uploadform()">Edit</button>
            </form>
        </center>
      </div>
  </div>

  <!--delete modal-->
  <div style="color:black; width : 400px;" id="mybook_delete_<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-body">
        <center>
          <p>Delete "<?php echo $title; ?>"</p>
          <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
          <a href="process.php?action=7&book=<?php echo $id;?>" class="btn btn-danger">Delete</a>
        </center>
      </div>
  </div>

<?php
  }
}
?>
</table>