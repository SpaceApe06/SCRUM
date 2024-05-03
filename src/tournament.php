<?php
session_start();
include("DB_connect.php");

// Check if user is logged in
if(!isset($_SESSION['userID'])) {
    echo "You must be logged in to join the LAN party.";
    exit;
}

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['join'])) {
        // User wants to join LAN party
        $query = "UPDATE users SET enter = 1 WHERE userID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['userID']);
        $stmt->execute();

        // Set session variable to indicate user is participating
        $_SESSION['participating'] = true;
    } elseif(isset($_POST['leave'])) {
        // User wants to leave LAN party
        $query = "UPDATE users SET enter = 0 WHERE userID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['userID']);
        $stmt->execute();

        // Set session variable to indicate user is not participating
        $_SESSION['notParticipating'] = true;
    }
}

// Check if user is participating
if(isset($_SESSION['participating'])) {
    echo "You have joined the Wolfenstein LAN.";
    unset($_SESSION['participating']);    // Unset the session variable to display the message only once.
}

if(isset($_SESSION['notParticipating'])) {
    echo "You are not joining the LAN.";
    unset($_SESSION['notParticipating']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Wolfenstein LAN</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div id="tournament_container">
        <h1>Wolfenstein LAN Party</h1>
        <?php
        // Check if user is admin
        $query = "SELECT admin FROM users WHERE userID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['userID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Display all participants if user is an admin
        if($user['admin'] == 1) {
            $query = "SELECT username FROM users WHERE enter = 1";
            $result = $conn->query($query);
            echo "<div id='participants_container'>";
            echo "<p id='participant'> Users participating in the LAN party </p> <br>";
            while($row = $result->fetch_assoc()) {
                echo $row['username'] . " is participating.<br>";
            }
            echo "</div>";
        }
        ?>
        <p></p>
        <div>
            <form method="post">
                <input id="join_button" type="submit" name="join" value="Join LAN Party">
                <input id="leave_button" type="submit" name="leave" value="Leave LAN Party">
            </form>
        </div>
        <p> Download Wolfenstein enemy territory here <a href="FTPØ.php">Download</a></p>
        <a id="log_out" href="log_out.php">Log Out</a>   
        <p></p>
            
    </div>
</body>
</html>
