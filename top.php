<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore page</title>
    <style>
        @import 'https://fonts.googleapis.com/css2?family=Lato&display=swap';
        html
        {
            font-family: "Lato", Arial, sans-serif;
        }
        #foot{
            left: 5%;
            top:20px;
            position: absolute;
        }
        #foot a
        {
            text-decoration: none;
            color: white;
            background:#d63031;
            padding: 10px 20px;
            border-radius: 8px; 
        }
        #foot1{
            right: 5%;
            top:20px;
            position: absolute;
        }
        #foot1 a{
            text-decoration: none;
            color: white;
            background:#d63031;      
            padding: 10px 20px;
            border-radius: 8px; 
        }
        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        }

        li {
        float: left;
        }

        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }

        li a:hover {
        background-color: #111;
        }
        #a
        {
            color: white;
        }
        #a a
        {
            color: white;
        }
        #buy
        {
            
            margin-left: 210px;
            text-decoration: none;
            color: black;
            border: 2px solid black;
            border-radius: 4px;
            padding: 5px;
        }
        #auction
        {
    
          text-align: center;
          margin:30px;
          margin-bottom: 50px;
          margin-top: 50px;
        }
        #auction h1
        {
          font-size: 30px;
          /* border: 2px solid black; */
          display: inline;
          border-radius: 8px;
          padding: 20px;

        }
        #auction h1:hover
        {
            font-size: 40px;    
            transition-duration: 1s;
        }
        #auction a
        {
            text-decoration: none;
            color: whitesmoke;
            background:#d63031;
            padding: 10px 20px;
            border-radius: 8px; 

        }
       
    </style>
    <link rel="stylesheet" href="image.css">

    <link rel="stylesheet" href="basic_page_css.css">
</head>
<body>
 
   
    <div id="foot">
        <a href="homePage.php" >Home page</a>
    </div>
     &nbsp;&nbsp;&nbsp;
     <div id="foot1">
        <a href="login_signup/index.php" >Logout</a>
     </div>
     <header>
         <nav>
         <ul>
            <li><a href="top.php">Top</a></li>
            <li><a href="art.php">Art</a></li>
            <li><a href="music.php">Music</a></li>
            <li><a href="photography.php">Photography</a></li>
            <li><a href="sports.php">Sports</a></li>
            <li><a href="domain.php">Domain Names</a></li>
            <li><a href="trading.php">Trading Card</a></li>
        </ul>
         </nav>
     </header>
    
    <div id="auction">
        <h1><a href="auction.php">Auction</a></h1>
    </div>
    </div>
    <div id="container">
        <?php 
            $myconnection=mysqli_connect("localhost:3308","root","","project");
            session_start();
            // echo $_SESSION["user_id"];
            $query= "SELECT * FROM images; "; 
            $query_run=mysqli_query($myconnection,$query);
            
            if (mysqli_num_rows($query_run) > 0) 
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    if ($row['ownerid']!=NULL)
                    {
                        continue;
                    }
                    $id=$row['id'];
                    $price=$row['price'];

                    echo '<div id="image">';  
                    $x = $row["path"];
                    echo '<img src="'.$x.'">';

                    echo '<div><a id="buy" href="p10pay.php?id='.$row["nft"].'&price='.$price.'&userid='.$_SESSION["user_id"].'">BUY</a><br></div>';  

                    echo '<br><div id="content">NFT Current Bid :- '.$price.'<br>Name: '.$row["nft"].'<br><br>Lorem ipsum dolor sit amet.';
                    echo '</div>';

                    echo '</div>';
                }   
            }
        ?>
    </div>  

</body>
</html>