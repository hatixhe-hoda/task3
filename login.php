<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h2>Login</h2>

    <form action="login_process.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>


        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br><br>


        <input type="submit" value="Login">
        <hr/>
        <div class="button-center"><a href="register.php">Register</a></div>
    </form>
</body>

</html>