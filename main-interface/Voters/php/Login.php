<?php include './config.php' ?>

<?php
	
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$id = $_POST['id'];
		$id = mysqli_escape_string($con,$id);
		// $password = md5($_POST['password']);
		$password = $_POST['password'];
		$password =  mysqli_escape_string($con,$password);

		$query="SELECT * FROM voter WHERE voter_ID = $id AND voter_password = '$password'";
		$result=mysqli_query($con, $query);
	
		if($checking = mysqli_fetch_assoc($result))
		{
			header("Location:ballot.html");
		}
		else
		{
			header("Location:index.html");
		}

	}
?>