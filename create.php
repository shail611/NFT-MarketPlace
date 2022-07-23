<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST['nftname'];
    $path = "image/";
    $_FILES['file']['name'] = $_POST["nftname"] . ".jpg";
    $path = $path . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        echo "Success uploading" . basename($_FILES['file']['name']);
        echo $path;
        $servername = "localhost:3308";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password, "project");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $a = $_POST["nftname"];
            $b = $_POST["nftp"];
            echo $a;
            $sql = "insert into images(nft,price,ownerid,path) values('$a',$b,NULL,'$path');";
            if (mysqli_query($conn, $sql)) {
                echo "NFT Created";
            }
        } else {
            echo "0 results";
        }
    }

    echo "<script>window.location.href='homePage.php';</script>";
} else {
    // echo "Error when uploading file.";
}




?>
<html>

<head>
    <style>
        @import 'https://fonts.googleapis.com/css2?family=Lato&display=swap';

        html {
            font-family: "Lato", Arial, sans-serif;
        }
        body
        {
            background: url('image/nftpic.png');
            background-size:contain;
        }
        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=number],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            display: flex;
            margin-top: 12%;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>

<body >
        
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

            <label for="fname">Enter Name of NFT: </label>
            <input type="text" name="nftname" placeholder="NFT name..">
            <label for="fname">Enter price to keep: </label>
            <input type="number" name="nftp" placeholder="NFT price..">
            Upload your NFT: <input type="file" name="file" accept="image/*"> <br><br>
            <input type="submit" value="Submit">

        </form>
    </div>

</body>

</html>