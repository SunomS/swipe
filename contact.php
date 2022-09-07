<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$location = $_POST['location'];

	// Database connection
	$conn = new mysqli('localhost','root','','test2');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, location) values(?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $email, $location);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>