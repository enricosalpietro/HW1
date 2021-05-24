<?php
    
	
	//se le variabili dell' array post sono settate
	if(isset($_POST["username"]) && isset($_POST["password"]) && 
	isset($_POST['name']) &&
	isset($_POST['surname']) &&  isset($_POST['email']) )
	{
		// connessione al database
		$conn = mysqli_connect("127.0.0.1", "root", "", "DB");
		//injection
		$username= mysqli_real_escape_string($conn, $_POST['username']);
		$password= mysqli_real_escape_string($conn, $_POST['password'] );
		$name=mysqli_real_escape_string($conn, $_POST['name']);
		$surname=mysqli_real_escape_string($conn, $_POST['surname']);
		$email=mysqli_real_escape_string($conn, $_POST['email']);
		//inseriamo la nostra query dentro una stringa 
		$query = "INSERT INTO utenti(username, password, name, surname, email) VALUES('$username','$password','$name','$surname','$email')";
		$res=mysqli_query($conn,$query);

        $_SESSION['username']=$_POST['username'];
            header("Location: login.php");
            exit;
	}
?>