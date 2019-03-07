<?php
require_once('operations/DBconfig.php');
require_once('operations/validations.php');

$response = array();
$response['success']=false;

if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        if (!empty($_POST['name']) &&
            !empty($_POST['dob']) &&
            !empty($_POST['email']) &&
            !empty($_POST['address']) && 
            !empty($_POST['income']) ) {

                $_POST['name']=mysqli_real_escape_string($conn,$_POST['name']);
                $_POST['dob']=mysqli_real_escape_string($conn,$_POST['dob']);
                $_POST['email']=mysqli_real_escape_string($conn,$_POST['email']);
                $_POST['address']=mysqli_real_escape_string($conn,$_POST['address']);
                $_POST['income']=mysqli_real_escape_string($conn,$_POST['income']);
              
                //pass the data through validations
                if (validateName($_POST['name'])) {
					if (validateDOB($_POST['dob'])) {
						if (validateEmail($_POST['email'])) {
							if (validateAddress($_POST['address'])) {
								if (validateIncome($_POST['income'])) {
									$sql = "INSERT INTO `manager`(`name`, `email`, `dob`, `address`, `income`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['dob']."','".$_POST['address']."','".$_POST['income']."')";
									$query = mysqli_query($conn,$sql);
									if($query) {
										$response['success']=true;
										$response['message']="Information Submitted Successfully.";
									}
									else {
										$response['message']=mysqli_error($conn);
									}
								} 
								else {
									$response['message']="Please enter a valid Income";
								}
							} 
							else {
								$response['message']="For Address You can  use only space, letters, numbers, and symbols like , . - ";
							}
						}
						else {
							$response['message']="Please enter a valid email format";
						}
					} 
					else {
						$response['message']="Please enter a valid Date of Birth";
					}
                }
                else {
                	$response['message']="Name can have only lower and upper case letters";
                }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Dinesh Kumar Sisodiya">
  <title>Assignment</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>

  <div class="form-container">
  	<h3 class="title">Add Manager</h3><hr>
  	<?php
  		if(!empty($response['message'])) {
  			if($response['success']==true) {
  				echo '<div class="success">'.$response['message'].'</div><hr>';
  			} 
  			else {
  				echo '<div class="error">'.$response['message'].'</div><hr>';
  			}
  		}
  	?>
  	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" accept="charset UTF-8">
	    <div class="form-group">
	      <label for="name">Full Name :</label>
	      <input type="text" class="form-control" name="name" placeholder="Type a name " required>
	      <div id="list_box">
	      	
		  </div>
	    </div>
	    <div class="form-group">
	      <label for="dob">Date of Birth :</label>
	      <input type="text" class="form-control" name="dob" required readonly>
	    </div>
	    <div class="form-group">
	      <label for="email">Email address :</label>
	      <input type="email" class="form-control" name="email" required readonly>
	    </div>
	    <div class="form-group">
	      <label for="address">Address :</label>
	      <input type="text" class="form-control" name="address" required readonly>
	    </div>   
	    <div class="form-group">
	      <label for="income">Income :</label>
	      <input type="number" class="form-control" name="income" required readonly>
	    </div>
  
  	    <button type="reset" class="btn">Reset</button>
    	<button type="submit" name="submit" class="btn pull-right">Add Manager</button>
    </form>
</div>
 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
