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
									$sql = "INSERT INTO `employee`(`name`, `email`, `dob`, `address`, `income`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['dob']."','".$_POST['address']."','".$_POST['income']."')";
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
</head>

<body>

  <div class="form-container">
  	<h3 class="title">Add Information</h3><hr>
  	<div id="form-log">
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
  	</div>
  	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" accept="charset UTF-8">
	    <div class="form-group">
	      <label for="name">Full Name :</label>
	      <input type="text" class="form-control" name="name" placeholder="ex : Dinesh Sisodiya" required>
	    </div>
	    <div class="form-group">
	      <label for="dob">Date of Birth :</label>
	      <input type="text" class="form-control" name="dob" placeholder="ex : 1997-05-20" required>
	    </div>
	    <div class="form-group">
	      <label for="email">Email address :</label>
	      <input type="email" class="form-control" name="email" placeholder="ex : myemail@email.com" required>
	    </div>
	    <div class="form-group">
	      <label for="address">Address :</label>
	      <input type="text" class="form-control" name="address" placeholder="ex : 92 Delhi West, Pin-110092" required>
	    </div>   
	    <div class="form-group">
	      <label for="income">Income :</label>
	      <input type="number" maxlength="13" step=".01" class="form-control" name="income" placeholder="ex : 1000.00" required>
	    </div>
  
  	    <button type="reset" class="btn">Reset</button>
    	<button type="submit" name="submit" class="btn pull-right">Submit</button>
    </form>
</div>
  
  

</body>

</html>
