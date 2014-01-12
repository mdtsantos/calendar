<?php
		mysql_connect('localhost','root');
		mysql_select_db('messages');// connect to database

		function view_all(){
			$query = "SELECT * FROM messages";
			$result = mysql_query($query);
			$get = array();
			if( mysql_num_rows($result) > 0){
				while($row = mysql_fetch_assoc($result)){
					$get[] = $row;
				}
			}
			return $get;
		}

		function delete($id){
			$query_delete = "DELETE FROM messages WHERE id = '$id'";
			$result_delete = mysql_query($query_delete);
			return $result_delete;
		}
?>