

<?php
	include "utilities.php";

	$get = view_all();		
?>


<table border='1' style='padding:2px;'>
<tr>
	<td style='padding:5px;font-weight:bold'>ID</td>
	<td style='padding:5px;font-weight:bold'>Name</td>
	<td style='padding:5px;font-weight:bold'>Message</td>
	<td style='padding:5px;font-weight:bold'>Email</td>
	<td style='padding:5px;font-weight:bold'>Date Posted</td>
	<td style='padding:5px;font-weight:bold'>Approved</td>
	<td colspan='2' style='padding:5px;font-weight:bold;' align = 'center'>Action</td>
	
</tr>
	<?php foreach($get as $gets):?>
<tr>
	<td><?php echo $gets['id'];?></td>
	<td><?php echo $gets['name'];?></td>
	<td><?php echo $gets['message'];?></td>
	<td><?php echo $gets['email'];?></td>
	<td><?php echo $gets['date_posted'];?></td>
	<td><?php echo $gets['is_approved'];?></td>
	<td>
		<form method = "POST" action = "approved.php?id=<?php echo $gets['id'];?>">
			<?php
			if($gets['is_approved'] == 'Y'){
				echo "<input type = 'submit' value = 'reject'></td></form>";
			}else{
				echo "<input type = 'submit' value = 'approved'></td></form>";
			}
			
			?>
	<td><form method = "POST" action = "delete.php?id=<?php echo $gets['id'];?>">
		<input type = 'submit' value = 'Delete'></td></form>
	<?php endforeach;?>
</table>
<br>
<a href = "a.php">Back</a>
