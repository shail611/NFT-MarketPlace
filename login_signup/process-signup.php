<?php
session_start();
// echo "<script>alert('at the top');</script>";
echo $_POST["email"];

if (empty($_POST["name"])) {
    
    echo "<script>alert('coming here');</script>";
    $_SESSION["error"] = "Name is required";
    session_abort();
    // header("Location: signup.php");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION["error"] = "Valid email is required";
    header("Location: signup.php");
}

if (strlen($_POST["password"]) < 8) {
    $_SESSION["error"] = "Password must be at least 8 characters";
    header("Location: signup.php");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    $_SESSION["error"] = "Password must contain at least one letter";
    header("Location: signup.php");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    $_SESSION["error"] = "Password must contain at least one number";
    header("Location: signup.php");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $_SESSION["error"] = "Passwords must match";
    header("Location: signup.php");
}

// echo "I am here!!";
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {
    // echo "<script>alert('coming here')</script>";
    header("Location: signup-success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
        $_SESSION["error"] = "email already taken";
    header("Location: signup.php");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>




