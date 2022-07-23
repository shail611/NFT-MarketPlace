<html>
    <head>
        <style>
             .htext{
                font-family: sans-serif;
                position: absolute;
                top:30%;
                right: 5%;
            }
            .htext button
            {
                color: white;
                font-weight: bold;
                background:#d63031;
                padding: 20px 30px;
                border-radius: 8px; 
            }
        </style>
    </head>
    <body>
        <img src="image\homepage.png" id="your-img" height="693px" width="100%">
        <div class="htext">
            <button onclick="window.location.href='top.php'">Explore</button> <br><br>
            <button onclick="window.location.href='create.php'">Create</button>
            <?php 
            session_start();
            ?>
        </div>
        
    </body>
</html>