<html>
<?php
$con = mysql_connect('localhost','root','');
mysql_select_db('messages',$con);// connect to database

// if the link Delete will click this is the code will executed
if(isset($_GET['id_delete'])){
$id = $_GET['id_delete'];
$query_delete = "DELETE FROM messages WHERE id = {$id}";
$result_delete = mysql_query($query_delete);

}

//Show messages
?>
<h3>Messages</h3>
<?php
$table = "<table border=1px; style='padding:2px;'>
<tr>
<td style='padding:5px;font-weight:bold;'>Name</td>
<td style='padding:5px;font-weight:bold;'>Date Posted</td>
<td style='padding:5px;font-weight:bold;'>Message</td>
</tr>";

$query = "SELECT * FROM messages";
$result = mysql_query($query);
$number_rows = mysql_num_rows($result);

// check if the number of rows is greater than 1 or equal. If so, the value from database will fecth and displayed
if($number_rows >= 1){
// fetch all data from database
while($row = mysql_fetch_array($result)){

// Display all data to the table
$table.="<tr>
<td style='padding:5px;'>".$row[1]."</td>
<td style='padding:5px;'>".$row[4]."</td>
<td style='padding:5px;'>".$row[2]."</td>


</tr>";

}
$table.="</table>";
}else{
$table.="<tr><td colspan='7' align='center'>No Data</td></tr></table>";
}

echo $table;


//Post message and submit to database
?>
<h3>Post New Message</h3>
<form method = "POST" >
Name<br>
<input type = "text" name = "name"><br>
Email
<br>
<input type = "text" name = "email"><br>
Message
<br>
<textarea name = "message"></textarea>
<br>
<input type="submit" name="save" value="Post Message">
</form>
<?php
if(isset($_POST['save'])){//if post message button clicked
if (!empty($_POST['name']) && !empty($_POST['message']) && !empty($_POST['email'])){
$nme = $_POST['name'];
$msg = $_POST['message'];
$eml = $_POST['email'];
$query = "INSERT INTO messages SET  name = '$nme', message = '$msg', email ='$eml',date_posted = date(CURDATE()), is_approved = 'N'";
$result = mysql_query($query);
header("Location: backend.php");
}
}
 
?>

</html>