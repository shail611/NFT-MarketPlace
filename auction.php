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
        /* #a
        {
            background-color:papayawhip;
        }
        #a a
        {
            color: white;
        } */
        #buy
        {
            margin-left: 210px;
            text-decoration: none;
            color: black;
            border: 2px solid black;
            border-radius: 4px;
            padding: 5px;
        }
        .htext{
            font-family: sans-serif;
            position: absolute;
            text-align: center;
            left: 40%;
            top:20%;
           
        }
        .htext h1{
            font-size: 20px;
            color:coral;
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
        #detail
        {
            margin-left:90px;
        }
        #submit
        {
            margin-left: 110px;
            margin-top: 30px;
            background:crimson;
            color: white;
            padding: 10px 20px;
            border-radius: 8px; 
        }
        #buynft
        {
            margin-top: 30px;
            font-size: 30px;
            margin-left: 70px;

        }
        #buynft a
        {
            text-decoration: none;
            color:aliceblue;
            border: 2px solid black;
            border-radius: 8px;
            margin-left: 30px;
            font-size: 20px;
            padding: 10px;
        }
        #canclenft
        {
            font-size: 30px;
            text-align: center;
            margin: 20px;
            color: red;
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
     <div class="htext">
        <h1>Explore our collections </h1>
     </div>
     
    <br><br>
    

  
    
    <!-- <div id="auction">
        <h1><a href="">Auction</a></h1>
    </div> -->

    <div id="container">
        <?php 
        // session_start();
            $myconnection=mysqli_connect("localhost:3308","root","","project");
        
        $_SESSION["auc"]=0;
            $query= "SELECT * FROM auction "; 
            $query_run=mysqli_query($myconnection,$query);
            
            if (mysqli_num_rows($query_run) > 0) 
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                    $id=$row['id'];
                    $price=$row['price'];

                    if(!empty($_POST['id']))
                    {
                        $id2=$_POST['id'];
                        if($id != $id2)
                        continue;
                    }
                    
                    echo '<div id="image">';  
                    echo '<img src="'.$row["path"].'">';

                    // echo '<div><a id="buy" href="basic.php?id='.$id.'">BUY</a><br></div>';  

                    echo '<br><div id="content"><br>Name: '.$row["nft"].' <br><br>Price: ??? </div>';

                    if(!empty($_POST['auctionprice']))
                    {   
                        $auctionprice=$_POST['auctionprice'];
                        $actualprice=$_POST['actualprice'];
                        if($actualprice<  $auctionprice)
                        {
                            if($id == $id2)
                            echo '<div id="buynft">Yeahhhh !!! let\'s<a href="p10pay.php?id='.$row["nft"].'&price='.$auctionprice.'&x=1">Buy</a></div>';
                        }
                        else    
                        {
                            echo '<div id="canclenft">Your bidding is too low !</div>';
                            
                        }
                    }
                    else if($row["ownerid"]==NULL)
                    echo '<div id="detail"><br><br><form method="POST" action="auction.php"><input type="hidden" name="id" value="'.$id.'"><input type="hidden" name="actualprice" value="'.$price.'" >Your bid : <input type="text" name="auctionprice" required><br><input id="submit" type="submit" name="submit" value="Auction"></form></div>';
                    
                    

                    echo '</div>';
                }   
            }
        ?>
    </div>  

</body>
</html>