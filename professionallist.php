<?php
$con=mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");


if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$vc_seg = $_GET['id'];

$page = $_GET['page'];
	$n = $page*4;

$result = mysqli_query($con,"SELECT dcomp_contact.city, dcomp_contact.email,dcomp_contact.fName , dcomp_contact.lName,dcomp_contact.desig, dcomp_mast.compname, dcomp_contact.country FROM dcomp_contact, dcomp_mast WHERE dcomp_contact.vc_segment='$vc_seg' AND dcomp_contact.compId = dcomp_mast.compId LIMIT $n,4");
$json = array();

while($row = $result->fetch_assoc() ) {
			
		$json[] = array(
				
				
				'name' => $row['fName']." ".$row['lName'],
				'compname' => $row['compname'],
				'desig' => $row['desig'],
				'country' => $row['country'],
				'city'=>$row['city'],
				'email'=>$row['email']
				
				
				
			);
		
	}
	

$jsonstring = json_encode($json);
	echo $jsonstring;
mysqli_close($con);
?>