	<?php
	session_start();	

	// variable declaration
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'kcc_forum');

	// REGISTER USER
	if (isset($_POST['register'])) {
		// receive all input values from the form
		$userId = mysqli_real_escape_string($db, $_POST['user']);
		$password_1 = mysqli_real_escape_string($db, $_POST['pass1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['pass2']);

		// form validation: ensure that the form is correctly filled
		if (empty($userId)) { array_push($errors, "userId is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		$query="SELECT userId FROM registration WHERE userID= '$userId' ";
		$exec=mysqli_query($db,$query);
		if(mysqli_num_rows($exec) != 0)
		{
			array_push($errors,"userId already exists");
			
		}
			
		
		 
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO registration (userId,password) 
					  VALUES('$userId','$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $userId;
			$_SESSION['success'] = "You are now logged in";
			$cookie_name = "user";
            $cookie_user=$userID;
        setcookie($cookie_name, $cookie_user, time() + (86400 * 30), "/");// 86400 = 1 day
			header('location: ../index.php');
		}

	}



	// LOGIN USER
	if (isset($_POST['getIN'])) {
		$username = mysqli_real_escape_string($db, $_POST['userId']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "userId is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM registration WHERE userId='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				$cookie_name="user";
				$cookie_user=$username;
                setcookie($cookie_name, $cookie_user, time() + (86400 * 30), "/"); // 86400 = 1 day
				header('location: ../index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	?>