<?php
$con=mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");


if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$userid = $_GET['userid'];
$password = $_GET['password'];

$currDate = date("Y-m-d h:i:s");

$result = mysqli_query($con,"SELECT pass, userName, valid_till, user_status FROM user_detls where userid='$userid' and pass='$password' ");

$json = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "wTitle: " . $row["wTitle"]. " - Name: " . $row["wNameFirst"]. " ". $row["wNameLast"] ."<br>";
		$json[] = array(
				'username' => $row['userName'],
				'valid_till' => $row['valid_till'],
				'user_status' =>$row['user_status']
			);
		
		}
	} else {
    echo "0 results";
	}
	
	$jsonstring = json_encode($json);
	echo $jsonstring;
mysqli_close($con);



?>