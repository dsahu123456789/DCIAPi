<?php
	$con = mysqli_connect("50.62.209.47","dbddbadmin","Dbddemo@3579","dbddemo");
	
	if(mysqli_connect_errno($con)){
		echo "Failed to connect ".mysqli_connect_error();
	}
	
	$id = $_GET['id'];
	//$result = mysqli_query($con,"SELECT	compName,vc_segment,contPers,advWebsite,adImage FROM adManage WHERE id=$id");
	$result = mysqli_query($con,"SELECT adManage.compName, adManage.vc_segment,adManage.contPers,adManage.advWebsite,adManage.adImage, whoswho.wDesig , Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID;");
	
	$json = array();
	
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $json[] = array(
				'compname' => $row['compName'],
				'vcsegment' =>$row['vc_segment'],
				'contpers' =>$row['contPers'],
				'adwebsite' =>$row['advWebsite'],
				'image'=>$row['adImage']
			);
		
		}
	} else {
    echo "0 results";
	}
	
	$jsonstring = json_encode($json);
	echo $jsonstring;
mysqli_close($con);
	?>