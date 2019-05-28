	<?php
	// session_start();	

	// variable declaration
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'forum');

	// REGISTER USER
	if (isset($_POST['register'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['pass1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['pass2']);
		$profile_pic='profile_icon.jpg';

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		$query="SELECT email FROM member_table WHERE email= '$email' ";
		$exec=mysqli_query($db,$query);
		if(mysqli_num_rows($exec) != 0)
		{
			array_push($errors,"userId already exists");
			
		}		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO member_table (username,email,password,profile_pic) 
					  VALUES('$username','$email','$password','$profile_pic')";
			mysqli_query($db, $query);
			// echo $uid;

			// $_SESSION['uid'] = $uid;
			// $_SESSION['email'] = $email;
			// $_SESSION['profile_pic'] = $profile_pic;
			header("location: getIN.php?email=$email");
		}

	}



	// LOGIN USER
	if (isset($_POST['getIN'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM member_table WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$result = mysqli_fetch_array($results);

				$_SESSION['uid'] = $result['member_id'];
				$_SESSION['username'] = $result['username'];
				$_SESSION['profile_pic'] = $result['profile_pic'];

                if (isset($_POST['remember'])) {
                	setcookie('remember', 1, time() + (86400 * 30), "/");
                	setcookie('uid', $result['member_id'], time() + (86400 * 30), "/");
	                setcookie('username', $result['username'], time() + (86400 * 30), "/");
	                setcookie('profile_pic', $result['profile_pic'], time() + (86400 * 30), "/");
                }
				header('location: ../index.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

	?>