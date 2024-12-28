<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u3";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

// select user from db 
$sql = "SELECT * FROM users WHERE email = '$email';";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        
        // verify pass
        if (password_verify($password, $row['password'])) {
            // start a session for this user
            session_start();
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];

            header('Location: profile.php');
        }
    }
} else {
    echo "User not found!";
}
mysqli_close($conn);