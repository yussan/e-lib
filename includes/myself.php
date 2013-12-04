<?php
include "../function.php";
connection();
session_start();
?>
<?php
//total mybook
$sql = mysql_query("SELECT COUNT(*) as 'total' FROM user_self INNER JOIN user ON user_self.fk_id_user = user.id WHERE user.username = '".$_SESSION['user']['username']."'"); 
$total = mysql_fetch_assoc($sql);
?>
<table class="table" style="color:#000; font-weight:none">
<tr>
  <td colspan="7">
    <h1 style="font-weight:bold">My Self : <?php echo $total['total'];?> Books</h1>
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
      <strong>DateBorrow</strong>
    </td>
    <td>
      <strong>DateEnd</strong>
    </td>
  	<td></td><td></td>

  </tr>
<?php

$user_id = $_SESSION['user']['id'];
$sql = mysql_query("SELECT book.id as id,book.title as title, book.description as description,user_self.date_borrow as borrow, user_self.date_end as end FROM user_self INNER JOIN user ON user.id = user_self.fk_id_user INNER JOIN book ON book.id = user_self.fk_id_book WHERE user.username = '".$_SESSION['user']['username']."' AND  (to_days(CURDATE()) < to_days(date_end))");

for ($n=1;$n<51;$n++) {
   while($myself = mysql_fetch_array($sql)) {
      $id = $myself['id'];
      $title = $myself['title'];
      $desc = $myself['description'];
      $borrow = $myself['borrow'];
      $end = $myself['end'];

?>

   <tr>
  	<td>
  		<?php echo $n;?>
  	</td>
  	<td>
  		<?php echo $title; ?>
  	</td>
  	<td>
  		<?php echo $desc; ?>
  	</td>
    <td>
      <?php echo $borrow; ?>
    </td>
    <td>
      <?php echo $end; ?>
    </td>
  	<td>
  		<a  class="btn btn-mini" type="button" data-toggle="modal"><i class="icon-eye-open"/></a>
  	</td>
  	<td>
  		<a href="#myself_delete_<?php echo $id;?>" class="btn btn-mini" type="button" data-toggle="modal"><i class="icon-trash"/></a>
  	</td>
  	
  </tr>

 <!--modal-->

<div style="color:black; width : 400px;" id="myself_delete_<?php echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
      <center>
        <p>Delete "<?php echo $title; ?>"</p>
        <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
        <a href="process.php?action=6&book=<?php echo $id;?>" class="btn btn-danger">Delete</a>
      </center>
    </div>
  </div>

<?php
      }
  }
?>
</table>