<?php
require_once('operations/DBconfig.php');
require_once('operations/validations.php');

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 120");

$data = array();
$data['success']=false;

$input = json_decode(file_get_contents("php://input"));

if(!empty($input->name) and validateName($input->name)) {
	$sql = "SELECT name, email FROM `employee` WHERE lower(name) LIKE lower('".$input->name."%')";
	$query=mysqli_query($conn,$sql);
	if($query) {
		$num_rows=mysqli_num_rows($query);
		if($num_rows>=1) {
			$data['success']=true;
			$data['list'] = mysqli_fetch_all($query,MYSQLI_ASSOC);
		}
	} else {
			die(mysqli_error($conn));
	}
}


echo json_encode($data);

?>