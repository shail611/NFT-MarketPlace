<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE userid = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>

        .htext{
            font-family: sans-serif;
            position: absolute;
            top:30%;
            left: 5%;
        }
        .htext h1{
            font-size: 4em;
            color: white;
        }
        .htext h2{
            font-size: 2em;
            line-height: 2em;
        }
        .htext h1 span{
            color: #d63031;
        }
        .htext a{
            text-decoration: none;
            color: white;
            background:#d63031;
            padding: 10px 20px;
            border-radius: 8px; 
        }

    </style>
</head>
<body>
    <?php
    $_SESSION["error"]="first";
    ?>

    <img src="nft.jpg" id="your-img" height="770px" width="100%">
    <div class="htext">
    <h1>WELCOME</h1>

    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php"><b>Log in</b></a> &nbsp;&nbsp;&nbsp; <a href="signup.php"><b>Sign up</b></a></p>
        
    <?php endif; ?>
    </div>
</body>
</html>
    
    
    
    
    
    
    
    
    
    
    