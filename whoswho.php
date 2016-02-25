<?php
	$con = mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");
	
	if(mysqli_connect_errno($con)){
		echo "Failed to connect ".mysqli_connect_error();
	}
	
	$page = $_GET['page'];
	$n = $page*6;
	
	$result = mysqli_query($con,"SELECT	id,wTitle,wNameFirst,wNameLast,wImgFile FROM whoswho WHERE pStatus='RECEIVED' ORDER BY wNameFirst LIMIT $n,6");
	
	$json = array();
	
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "wTitle: " . $row["wTitle"]. " - Name: " . $row["wNameFirst"]. " ". $row["wNameLast"] ."<br>";
		$json[] = array(
				'title' => $row['wTitle'],
				'firstname' => $row['wNameFirst'],
				'lastname' =>$row['wNameLast'],
				'id' =>$row['id'],
				'image' =>$row['wImgFile']
				
			);
		
		}
	} else {
    echo "0 results";
	}
	
	$jsonstring = json_encode($json);
	echo $jsonstring;
mysqli_close($con);
?>