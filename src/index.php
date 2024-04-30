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
        <div id="Logg_in_container">  
            <h1>Wolfensten LAN turnering</h1>
            <h1 id="logg_in_Title">Logg inn</h1>
            <div id="logg_in">
                <form method="post" action="log_in.php">
                <div id=brukernavnPassord>
                    <label for="username">Name:</label>
                    <input type="text" id="username" name="username" placeholder="Name" maxlength="20"><br><br>
                </div>
                <div id=brukernavnPassord>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" maxlength="20"><br><br>
                </div>
                    <button id="Login_button" type="submit" >Login</button><br/>
                    <a href="register_page.php">Don't have an account? Sign Up</a>
                </form>
            </div>
        </div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
    </body>
</html>