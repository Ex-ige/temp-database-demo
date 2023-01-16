<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temp";
$alert1 = $alert2 = "";

// Create connection to server
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
    $sql = "CREATE DATABASE '$dbname'";
    if (mysqli_query($conn, $sql)) {
        $alert1 = "Database created successfully.";
    } else {
        $alert1 = "Error creating database: " . mysqli_error($conn);
    }
}

// To Check for existing tables in database
    $conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SHOW TABLES LIKE 'temptb'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $alert2 = "Table already exists.";
}

// Creates a Table if non-existent with 3 columns
// One column for row identifier, another to know what variable it is, and what value it has
else {
    $sql = "CREATE TABLE temptb (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            varname VARCHAR(30) NOT NULL, val VARCHAR(30) NOT NULL)";
    if (mysqli_query($conn, $sql)) {
        $alert2 = "Table created successfully.";
    } else {
        $alert2 = "Error creating table: " . mysqli_error($conn);
    }
}

$conn->close();

?>

<?php
    //Set up of string var
    $msg = '';

    //Checking of button press and empty txt fields
    if(isset($_POST['submit']) && !empty($_POST['un']) && !empty($_POST['pass'])) {
        
        //Checking of text fields confirmation of content
        if (isset($_POST['un']) && isset($_POST['pass'])) {
            $user = $_POST['un'];
            $pass = $_POST['pass'];
	
	        // Create connection directly to database
	        $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
	        if ($conn->connect_error) {
		        die("Connection failed: " . $conn->connect_error);
	        }
            
            //Checking whether user exists
            // format goes "SELECT column header FROM table name WHERE variable to look for"
	        $sql = "SELECT username FROM login WHERE username='$user'";
	        $result = mysqli_query($conn, $sql);
         
	        if (mysqli_num_rows($result) > 0) { // True if username exists
		        
                //Checking whether password exists
                // format goes * is any/all columns with "WHERE var1 AND var2" is searched
		        $sql = "SELECT * FROM login WHERE username='$user' AND password='$pass'";
		        $result = mysqli_query($conn, $sql);
		
		        if (mysqli_num_rows($result) > 0) { // True if password is correct
                    $msg = "Login Successful!";
			        $sql = "INSERT INTO temptb (varname, val) VALUES ('user', '$user')";
			
			        if (mysqli_query($conn, $sql)) {
                        mysqli_close($conn);
				        header("Location: 3rd Page.php");
			        }
			        else
				        $alert2 = "Error: " . $sql . "<br>" . mysqli_error($conn);
		        }
                else
                    $msg = "Password is incorrect!";
	        }
            else
		        $msg = "User doesn't exist in database.";
        }
    }
    else{
        $msg = 'Please enter username or password';
    }
?>

<html>
    <head>
        <title>1st Page (Login)</title>
    </head>
    <body>
        <form method="post">
            <label> Login Page</label>
            <br>
            <br>

            <label for="un"> User Name:  </label>
            <input type="text" name="un" id="un">

            <br><br>

            <label for="pass"> Password:   </label>
            <input type="password" name="pass"  id="pass">
            <br>

            <input type="submit" value="submit" name="submit">
        </form>
        <p><?php echo $msg; ?></p>
        <br>
        
        <!--Creating button to register for db-->
        <form action="2nd%20page.php">
            <label for="register">Register Account -></label>
            <input type="submit" id="register" value="Register">
        </form>
        <br> <br>
    
        <!--Feedback on db actions-->
        <p><?php echo $alert1; ?></p>
        <p><?php echo $alert2; ?></p>
    </body>
</html>
