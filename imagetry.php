<?php



if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    echo $_POST['nftname'];
$path = "files/"; 
$_FILES['file']['name'] = $_FILES['file']['size'].$_FILES['file']['name'].".jpg";
$path = $path.basename($_FILES['file']['name']);
if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) 
{ 
    echo "Success uploading".basename($_FILES['file']['name']); 
    echo $path;
    $servername = "localhost:3306";
    $username = "root";
    $password = "";

    // Create connection
    // $conn = mysqli_connect($servername, $username, $password,"test");

    // // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // if ($_SERVER["REQUEST_METHOD"]=="POST")
    // {
    //     $a = $_POST["nftname"];
    //     $b = $_POST["nftp"];
    //     echo $a;
    //     $sql="insert into test values('$a',$b,'$path');";
    //     if (mysqli_query($conn,$sql))
        // {
        //      echo "NFT Created";
        // }
        
    //     } else {
    //         echo "0 results";
    //     }}
    
} 
else
{ 
    echo "Error when uploading file."; 
}

}
else{
    echo "for now";
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
Enter Name of NFT: <input type="text" name="nftname">
Enter price to keep: <input type="number" name="nftp">
Upload your NFT: <input type="file" name="file" accept="image/*"> <br><br>
    <input type="submit" value="submit">

</form>