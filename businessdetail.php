<?php
$con=mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");


if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];


$result = mysqli_query($con,"SELECT * FROM dcomp_mast WHERE id='$id'");
$result2 = mysqli_query($con,"SELECT * FROM dcomp_contact WHERE exetype='CONTACT' AND compID='$id'");
$json = array();

while($row = $result->fetch_assoc() ) {

$json[] = array(
				'id' => $row['id'],
				'compname' => $row['compname'],
				'country' => $row['country'],
				'catID' => $row['catID'],
				'busType' => $row['busType'],
				'website'=>$row['website'],
				'compP	rofile'=>$row['compProfile'],
				'image' =>$row['scrnShotPath'].$row['scrnShotImg']
				
				
				
			);
		
		}
		while($row2 = $result2->fetch_assoc()) {

$json[] = array(
				'name' =>$row2['fName']." ".$row2['lName'],
				'desig' =>$row2['desig'],
				'phone' =>$row2['phone'],
				'address' =>$row2['city'].", ".$row2['country'],
				'email' =>$row2['email']
			);
		
		}
		
	

$jsonstring = json_encode($json);
	echo $jsonstring;
mysqli_close($con);
?>