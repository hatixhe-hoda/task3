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

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//inssert into users
$sql = "INSERT INTO users (firstName, lastName, age, email, password) VALUES ('$firstName',' $lastName', '$age', '$email', '$password');";

if (mysqli_query($conn, $sql)) {
    // echo "User created succesfully";

    // redirect to login page
    header('Location: login.php');
} else {
    echo "Error:" . $sql .  "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
