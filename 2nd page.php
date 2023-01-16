<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temp";
$alert1 = $alert2 = "";
$msg ='';

//Checking of button press and empty txt fields
if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    //Checking of text fields confirmation of content
    $user = $_POST['username'];
    $pass = $_POST['password'];
	$msg = "test";
 
	// Create connection
	$conn = new mysqli($servername, $username, $password);

// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

// To check for existing database
	$sql = "SHOW DATABASES LIKE '$dbname'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		$alert1 = "Database already exists.";
	}

// Creates database if there isn't one
	else {
		$sql = "CREATE DATABASE $dbname";
		if (mysqli_query($conn, $sql)) {
			$alert1 = "Database created successfully.";
		} else {
			$alert1 = "Error creating database: " . mysqli_error($conn);
		}
	}

// To Check for existing tables in database
    $conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SHOW TABLES LIKE 'login'";
	$result = mysqli_query($conn, $sql);

// Checks if row in a table is not equal to 0 *includes Headers
	if (mysqli_num_rows($result) > 0) {
		$alert2 = "Table already exists.";
	}

// Creates a Table for login if non-existent
// One column for row identifier, another for username and password
	else {
		$sql = "CREATE TABLE login (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL)";
		if (mysqli_query($conn, $sql)) {
			$alert2 = "Table created successfully.";
		} else {
			$alert2 = "Error creating table: " . mysqli_error($conn);
		}
	}
	
	//Checking whether user exists
	$sql = "SELECT username FROM login WHERE username='$user'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) { // True if username exists
		$msg = "Username already exists! Please choose another one";
	}
	else{   // If username has no copy in database then store it
		$sql = "INSERT INTO login (username, password) VALUES ('$user', '$pass')";
		
		if (mysqli_query($conn, $sql)) {
			header("Location: 1st Page.php");
		}
        else
			$alert2 = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
	mysqli_close($conn);
}
else{
    $msg = 'Please enter username or password';
}
?>

<html>
    <head>
        <title>2nd Page (Register)</title>
    </head>
    <body>
        <h3>Please register credentials here.</h3>
        <br>
        <form method="post">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username">
            <br>

            <label for="password">Password: </label>
            <input type="password" id="password" name="password">

            <input type="submit" value="Submit" id="submit" name="submit">
            <br>
        </form>
        <p><?php echo $msg; ?></p>
        <br>
    
        <!--Feedback for db creation-->
        <p><?php echo $alert1; ?></p>
        <p><?php echo $alert2; ?></p>
    </body>
</html>
