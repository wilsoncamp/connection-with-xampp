<?php
$name= $_POST['name']
$email= $_POST['email']
$message= $_POST['message']

$conn = new mysqli('localhost','root','','contactdb');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
    }

    else {
		$stmt = $conn->prepare("insert into contact_me(Name,Email,Message) values(?, ?, ?)");
        $stmt->bind_param("sss", $name,$email,$message);
        $execval = $stmt->execute();
		echo $execval;
		echo "Send Message";
		$stmt->close();
		$conn->close();
    }
?>