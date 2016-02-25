<?php
	$con = mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");
	
	if(mysqli_connect_errno($con)){
		echo "Failed to connect ".mysqli_connect_error();
	}
	
	$id = $_GET['id'];
	$result = mysqli_query($con,"SELECT	wDesig, wComp,vc_segment,wBioProf,wImgFile FROM whoswho WHERE id=$id");
	
	$json = array();
	
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $json[] = array(
				'wDesig' => $row['wDesig'],
				'wComp' => $row['wComp'],
				'vc_segment' =>$row['vc_segment'],
				'wBioProf' =>$row['wBioProf'],
				'wImgFile' =>$row['wImgFile']
			);
		
		}
	} else {
    echo "0 results";
	}
	
	$jsonstring = json_encode($json);
	echo $jsonstring;
mysqli_close($con);
	?>