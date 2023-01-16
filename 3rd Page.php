<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "temp";
	$alert1 = $alert2 = "";
	
	// Create connection directly to specific database
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
    // Obtain last value of variable user as 1 row
    // format goes "SELECT value column FROM temptb table WHERE variable is user ORDER BY last input of id in descending with 1 row
	$sql = "SELECT val FROM temptb WHERE varname = 'user' ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
        $tempvar = $row["val"];
	} else {
		$alert1 = "No data available for user in the table";
	}
    
    mysqli_close($conn);
 
?>

<?php
    if(isset($_POST['logout'])){
        $conn = new mysqli($servername, $username, $password, $dbname);
	
	    // Check connection
	    if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
	    }

        $sql = "DELETE FROM temptb";
	
	    if (mysqli_query($conn, $sql)) {
		    mysqli_close($conn);
            header("Location: 1st Page.php");
	    }
    }
?>

<html>
	<head>
		<title>3rd Page (After Login)</title>
	</head>
	<body>
	    <header> Welcome! </header>
        <h1><?php echo "Greetings $tempvar!"; ?></h1>
        <br><br>
    
        <form method="post">
            <label for="logout"> Log out Here: </label>
            <input type="submit" value="Logout" name="logout" id="logout">
        </form>
	</body>
</html>