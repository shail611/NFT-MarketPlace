<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["userid"];
            
            header("Location: ../homePage.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url('i1.png');">
    <div class="center">
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <div class="txt_field">

        <input type="email" name="email" placeholder="Email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>
        <div class="txt_field">

        <input type="password" name="password" placeholder="Password" id="password">
        </div>
        <div class="signup_link">
        <button>Log in</button>
        </div>
    </form>
    </div>
</body>
</html>








