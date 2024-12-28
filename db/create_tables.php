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

$sql_create_table_users = "CREATE TABLE users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql_create_table_users)) {
    echo "<br> Table users created succesfully";
} else {
    echo "<br> Error creating table users: <br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>