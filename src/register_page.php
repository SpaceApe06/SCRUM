<!DOCTYPE html>
<html>
    <head>
        <title>Wolfenstein Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <!-- mottar brukernavn, brukernavn og passord-->
        <div id="Logg_in_container"> 
            <h2>Register</h2>
            <div id="Logg_inn">
                <form action="register.php" method="post">
                    <div id=brukernavnPassord>
                        <label for="username">Name:</label>
                        <input type="text" name="username" required>
                    </div>
                    <div id=brukernavnPassord>
                        <label for="password">Password:</label>
                        <input type="password" name="password" required>
                    </div>
                    <div id=brukernavnPassord>
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" name="confirm_password" required>
                    </div>
                    <!-- når knappen er trykket så vil den lagre tingene ovenfor i databasen -->
                    <button type="submit" id="Login_button" >Register</button>
                    <p>Already have an account? <a href="index.php">Login here</a></p>
                </form>
            </div>
        </div>
    </body>
</html>
