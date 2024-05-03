<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wolfenstein turnering</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- hvis bruker eksister kan den skrive brukernavn og passord for å logge seg -->

    <div id="Logg_in_container2">
            <h1 id="login_title">Wolfenstein ET Login</h1>
        <div id="logg_in">
            <form method="post" action="log_in.php">
                <div id="brukernavn">
                    <label for="username">Name:</label>
                    <input type="text" id="username" name="username" placeholder="Name" maxlength="20"><br><br>
                </div>
                <div id="Passord">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" maxlength="20"><br><br>
                </div>
                <!-- hvis brukeren eksisterer går den til påmelding siden, hvis ikke er det en link til å registrere seg -->
                <div id="loginfunction">
                   <p>Don't have an account? <a href="register_page.php">Sign Up</a></p>
                </div>
                <div id="loginbuttonfunc">
                    <button id="Login_button" type="submit">Login</button><br/>
                </div>
            </form>
        </div>
    </div>
    <script src="" async defer></script>
</body>
</html>
