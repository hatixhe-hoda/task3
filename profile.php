<?php
session_start();

$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
if (!isset($firstName) || (!isset($lastName))) {
    header('Location: login.php');
    exit();
}

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

// Fetch user data from the database
$select_user = "SELECT id, firstName, lastName, age, email FROM users  WHERE firstName = '$firstName' AND lastName = '$lastName'";
$users = mysqli_query($conn, $select_user);

if (!$users) {
    die("Error: " . mysqli_error($conn));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
<div>
    <h1>Profile</h1>
    <div class="user">
    <?php while ($row = mysqli_fetch_assoc($users)): ?>
        <div class="user-card">
            <h4><?php echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']); ?></h4>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($row['age']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
            <a href="logout.php">Logout</a>
        </div>
    <?php endwhile; ?>
    </div>
</div>
</body>
</html>



<?php
// Close the database connection
mysqli_close($conn);
?>
