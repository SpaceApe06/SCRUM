<?php
session_start();
include "DB_connect.php";


if(isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$password = validate($_POST['password']);

if(empty($username)) {
    header ("Location: index.php?error=Username is required!");
    exit();
}
else if(empty($password)) {
    header ("Location: index.php?error=Password is required!");
    exit();
}

$hashed_password = hash("sha256", $password);


$sql = "SELECT * FROM users WHERE username='$username'"; 

$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] === $username && $row['password'] === $hashed_password) {
        echo "Logged in";
        $_SESSION['username'] = $row['username'];
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['admin'] = $row['admin'];
        header("Location: tournament.php");
        
        exit();
    }
    else{
        header("Location: index.php?error=Something went wrong, check if username, password is correct!");    
        exit();
    }
}
else {
    header("Location: index.php?error=Invalid username or password!");
    exit();
}

?>