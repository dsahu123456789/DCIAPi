<?php
$con=mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");


if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$catid = $_GET['id'];


$result = mysqli_query($con,"SELECT * FROM dcomp_mast WHERE left(catid,4)='$catid' and rvwstatus='FINAL' ");

$json = array();

while($row = $result->fetch_assoc()) {

$json[] = array(
				'id' => $row['id'],
				'compname' => $row['compname'],
				'country' => $row['country'],
				'catID' => $row['catID'],
				'busType' => $row['busType']
				
			);
		
		}
		
	

$jsonstring = json_encode($json);
	echo $jsonstring;
mysqli_close($con);
?>