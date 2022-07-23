<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
</head>
<body style="background-image: url('i1.png');">
<?php session_start();?>
    <div class="center">
    <h1>Signup</h1>
    
    <form action="process-signup.php" method="post" id="signup" novalidate>
        <div class="txt_field">
            <input type="text" id="name" name="name" placeholder="Name" required>
        </div>
        
        <div class="txt_field">
            <input type="email" id="email" name="email" placeholder="Email">
        </div>
        
        <div class="txt_field">
            <input type="password" id="password" name="password" placeholder="Password">
        </div>
        
        <div class="txt_field">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
        </div>
        <span ><?php 
        
        
        echo $_SESSION["error"];
        ?> </span>
        <div class="signup_link">
            <button>Register</button>
        </div>
        
    </form>
    </div>
    
</body>














</html>









