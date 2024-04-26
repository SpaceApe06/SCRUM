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
        // User wants to join the LAN party
        $query = "UPDATE users SET enter = 1 WHERE userID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['userID']);
        $stmt->execute();

         // Set a session variable to show that the user is participating
         $_SESSION['participating'] = true;
        } elseif(isset($_POST['leave'])) {
            // User wants to leave the LAN party
            $query = "UPDATE users SET enter = 0 WHERE userID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $_SESSION['userID']);
            $stmt->execute();
    
            // Set a session variable to show that the user is not participating
            $_SESSION['notParticipating'] = true;
    }
}

// Check if user is admin
$query = "SELECT admin FROM users WHERE userID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['userID']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if($user['admin']) {
    // User is admin, show all users who are participating
    $query = "SELECT username FROM users WHERE enter = 1";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
        echo $row['username'] . " is participating.<br>";
    }
}

// Check if user is participating
if(isset($_SESSION['participating'])) {
    echo "You have joined the Wolfenstein LAN.";
    // Unset the session variable so the message is only shown once
    unset($_SESSION['participating']);
}

if(isset($_SESSION['notParticipating'])) {
    echo "You are not joining the LAN.";
    // Unset the session variable so the message is only shown once
    unset($_SESSION['notParticipating']);
}
?>

<form method="post">
    <input type="submit" name="join" value="Join LAN Party">
    <input type="submit" name="leave" value="Leave LAN Party">
</form>