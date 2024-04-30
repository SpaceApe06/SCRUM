<?php
session_start();
include("DB_connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // sjekker om passordene er like
    if ($password !== $confirm_password) {
        echo "Passwords do not match";
        exit();
    }

    // Hasher passordene før det blir lagret i database
    $hashed_password = hash("sha256", $password);

    // legger til data i database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to the login page after successful registration
        header("Location: index.php");
        exit();
    } else {
        echo "Registration failed";
    }
}
?>
