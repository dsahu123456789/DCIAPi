<?php
	$con = mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");
	
	if(mysqli_connect_errno($con)){
		echo "Failed to connect ".mysqli_connect_error();
	}
	
$id = $_GET['id'];
	
$result = mysqli_query($con,"SELECT fullMsg FROM messages where id='$id'");

	$json = array();
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()) {
						
			$json[] = array(
				'fullmsg' =>htmlentities( (string)$row['fullMsg'], ENT_QUOTES, 'utf-8', FALSE)
						
			);
						
		}
	} else {
    echo "0 results";
	}
	
	
	$jsonstring = json_encode($json);
	echo $jsonstring;
	mysqli_close($con);
?>