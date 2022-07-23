<html>
    <body style="text-align: center;background-color:rgba(200, 209, 208, 0.192);">
        <img height="90%" width="70%" src="https://www.legalraasta.com/wp-content/uploads/2017/06/legalraasta.gif" alt=""> <br>
        <img height="5%" width="10%" onclick="location.replace('top.php');" src="https://th.bing.com/th/id/R60cb8a6a5a398a80e044618574ab5e67?rik=0tHPdhHuG0c3zw&riu=http%3a%2f%2fyeagletravels.com%2fwp-content%2fuploads%2f2015%2f10%2fBak-to-Homepage-Button.png&ehk=8Bn69Bkq2dhu8PAONtOPzooHN62zVQ8QlXpJomDEf%2f0%3d&risl=&pid=ImgRaw" alt="">


        <?php
        session_start();
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $x = $_SESSION["auc"];
    
        $conn = mysqli_connect($servername, $username, $password,"project");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if ($x==1)
        {
            $sql = "update auction set ownerid='".$_SESSION['user_id']."' where nft='".$_SESSION['nftname']."';";
            if (mysqli_query($conn,$sql))
            {
                $a=1;
            }
        }
        // Check connection
        else{
            $sql = "update images set ownerid='".$_SESSION['user_id']."' where nft='".$_SESSION['nftname']."';";
            if (mysqli_query($conn,$sql))
            {
                $a=1;
            }
            $sql = "update user set nft='".$_SESSION['nftname']."' where userid='".$_SESSION['user_id']."';";
            if (mysqli_query($conn,$sql))
            {
                $a=1;
            }
        }
        
        
        ?>
    </body>
</html>
