<?php
	$con = mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");
	
	if(mysqli_connect_errno($con)){
		echo "Failed to connect ".mysqli_connect_error();
	}
	

$result = mysqli_query($con,"SELECT * FROM messages where wShowHide = 'SHOW' order by dispOrder asc, wNameFirst asc, wNameLast asc");

	$json = array();
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()) {
						
			$json[] = array(
				'id' =>htmlentities( (string)$row['id'], ENT_QUOTES, 'utf-8', FALSE),
				'name' =>htmlentities( (string)$row['wTitle']." ".$row['wNameFirst']." ".$row['wNameLast'], ENT_QUOTES, 'utf-8', FALSE),
				'desig' =>htmlentities( (string)$row['wDesig'], ENT_QUOTES, 'utf-8', FALSE),
				'comp' =>htmlentities( (string)$row['wComp'], ENT_QUOTES, 'utf-8', FALSE),
				'briefmsg' =>htmlentities( (string)$row['briefMsg'], ENT_QUOTES, 'utf-8', FALSE),
				//'fullmsg' =>htmlentities( (string)$row['fullMsg'], ENT_QUOTES, 'utf-8', FALSE),
				'imageurl' =>htmlentities( (string)"http://www.denimclubindia.com/images/who_is_who/".$row['wImgFile'], ENT_QUOTES, 'utf-8', FALSE)			
			);
						
		}
	} else {
    echo "0 results";
	}
	
	//$json =  htmlentities( (string) $json, ENT_QUOTES, 'utf-8', FALSE);
	
	$jsonstring = json_encode($json);
	echo $jsonstring;
	mysqli_close($con);
?>