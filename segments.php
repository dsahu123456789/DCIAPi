<?php
$con=mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");


if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$result = mysqli_query($con,"SELECT segment,catId FROM dcomp_cat WHERE NOT segment='NA' order by dispOrd asc");

$json = array();
if($result->num_rows>0){
while($row = $result->fetch_assoc()) {

$json[] = array(
				'segment' => $row['segment'],
				'id'=>$row['catId']
			);
		
		}
	} else {
    echo "0 results";
	}

$jsonstring = json_encode($json);
	echo $jsonstring;
mysqli_close($con);
?>