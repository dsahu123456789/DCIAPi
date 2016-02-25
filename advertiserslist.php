<?php
$con=mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");


if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$category = $_GET['category'];
$page = $_GET['page']-1;
$n = $page*6;
$result = mysqli_query($con,"SELECT id,compName,logoImage,compId FROM adManage WHERE advtCat = '$category' ORDER BY compName LIMIT $n,4");


$json = array();
if($result->num_rows>0){
while($row = $result->fetch_assoc()) {

$json[] = array(
			'compname' => $row['compName'],
			'logoimage'=>$row['logoImage'],
			'id'=>$row['id'],
			'compid'=>$row['compId']
			);
				
		}
				
	} else {
    echo "0 results";
	}
	$jsonstring = json_encode($json);
	echo $jsonstring;

mysqli_close($con);
?>