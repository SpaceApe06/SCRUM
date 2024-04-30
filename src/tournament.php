<?php
session_start();
include("DB_connect.php");

// sjekker om brukker er logget inn
if(!isset($_SESSION['userID'])) {
    echo "You must be logged in to join the LAN party.";
    exit;
}

// sjekker hvis form er submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['join'])) {
        // ønsker å bli med LAN party
        $query = "UPDATE users SET enter = 1 WHERE userID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['userID']);
        $stmt->execute();

         // Set session variable til å vise at user er påmeldt
         $_SESSION['participating'] = true;
        } elseif(isset($_POST['leave'])) {
            // bruker ønsker å forlatte LAN party
            $query = "UPDATE users SET enter = 0 WHERE userID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $_SESSION['userID']);
            $stmt->execute();
    
            $_SESSION['notParticipating'] = true;   //Set session variable til å vise at bruker ikke er påmeldt
    }
}


// sjekker hvis bruker er påmeldt 
if(isset($_SESSION['participating'])) {
    echo "You have joined the Wolfenstein LAN.";
    unset($_SESSION['participating']);    // Unset the session variable vil gjøre at meldingen er kun vist engang.
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
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div id="Tournament_container">
    <h1>Wolfenstein LAN Party</h1>
    <?php
    // sjekker hvis bruker er admin
    $query = "SELECT admin FROM users WHERE userID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['userID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // viser alle som er påmeldt hvis brukeren er en admin
    if($user['admin'] == 1) {
        $query = "SELECT username FROM users WHERE enter = 1";
        $result = $conn->query($query);
        echo "<div id='Participants_container'>";
        echo"<p id=participant> Users participating in the LAN party: </p> <br>";
        while($row = $result->fetch_assoc()) {
            echo $row ['username'] . " is participating.<br>";
        }
        echo "</div>";
    }
    ?>
    <p>Join the LAN party by clicking the button below.</p>
    <div>
    <form method="post">
        <input id="Join" type="submit" name="join" value="Join LAN Party">
        <input id="Leave" type="submit" name="leave" value="Leave LAN Party">
    </form>
    </div>
    <p> Download Wolfenstein enemy territory here: <a href="download.php">Download</a></p>
    <a id="Log_out" href="log_out.php">Log Out</a>       
</body>
</html>