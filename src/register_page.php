<!DOCTYPE html>
<html>
<head>
    <title>Wolfenstein Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="content">
        <h1>Wolfenstein ET Register</h1>
    <!-- </div> -->
    <!-- <div id="content"> -->
        <form action="register.php" method="post">
            <label for="register_username">Username:</label>
            <input type="text" id="register_username" name="username" required>

            <label for="register_password">Password:</label>
            <input type="password" id="register_password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="index.php">Login here</a></p>
    </div>
</body>
</html>
