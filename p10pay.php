<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<link rel="stylesheet" href="p10home.css">
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script>
      window.addEventListener('load',()=>{
          document.getElementById("paytm").style.display="none";
          const params = (new URL(document.location)).searchParams;
          const n = params.get('id');
          document.getElementById('name').innerHTML = n;
          const p = params.get('price');
          document.getElementById('price').innerHTML = p;
      })
  </script>
    
<body ng-app="" style="background-image: url(https://wallpaperaccess.com/full/4597134.jpg);">
<?php
session_start();
$a = $_GET["id"];
if(empty($_GET["x"]))
{
    $_SESSION["auc"]=0;
}
else
{
    $_SESSION["auc"]=1;

}
$_SESSION["nftname"]=$a;
?>
 
    <br>
<div style="text-align: center;font-size: 180%;font-weight: bold;color: rgba(79, 79, 236, 0.582);">
    Complete your purchase
</div>

<div style="margin-left: 10%;margin-top:3%;margin-right:5%;width: 80%;">
    <div style="display: inline-block;width: 45%;border-radius: 5%;">
        <div style="margin: 5%;text-align: center;">
            <span style="font-weight: bold;font-size: 30px;">Select Payment Option</span> <br><br>
            <input type="radio" id="crd" name="pay" style="margin-bottom: 5%;margin-left: -5%;" onclick="document.getElementById('cvv').style.display='';document.getElementById('paytm').style.display='none';" checked>  
            <img height="25%" width="25%" src="https://www.hsbc.co.uk/content/dam/hsbc/gb/images/credit-cards/premier-credit-card-uk.jpg" alt="">
            <input type="radio" id="ptm" name="pay" style="margin-left: 12%;" onclick="document.getElementById('cvv').style.display='none';document.getElementById('paytm').style.display='';">
            <img height="25%" width="25%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Paytm_Logo_%28standalone%29.svg/1200px-Paytm_Logo_%28standalone%29.svg.png" alt="">

        </div>
        <div style="margin: 2%;text-align: center;">
            <span style="font-weight: bold;font-size: 30px;">Personal Info</span> <br><br>
            <form name="myF">
                <div>
                    <input id="n" style="height: 20px; width: 45%;margin-right: 5%;margin-bottom: 5%;" type="text" name=""  placeholder="Name" required>
                    <input id="m" style="height: 20px; width: 35%;" type="email" name=""  placeholder="Mail" required> <br>
                    <textarea style="height: 100px; width: 90%;margin-left: 1%;margin-bottom: 5%;"  name="" id="mess" placeholder="Address"></textarea>
                </div>
            </form>

        </div>
        <div id="cvv" style="margin: 5%;background-image: url(https://st2.depositphotos.com/1000956/6824/i/950/depositphotos_68245631-stock-photo-credit-cards-background.jpg);text-align: center;">
            <span style="font-weight: bold;font-size: 30px;">Credit card Info</span> <br><br>
            <input id="noc" width="66%" type="text" placeholder="Name on Card"> <br><br>
            <input id="cv" type="number" placeholder="CVV"><br><br>
        </div>
        <div id="paytm" style="margin: 5%;background-image: url(https://wallpapertag.com/wallpaper/full/1/8/a/312252-most-popular-matrix-background-1920x1080.jpg);text-align: center;">
            <span style="font-weight: bold;font-size: 30px;color:white">payTM number</span> <br><br>
            <input id="pn" type="number" placeholder="Number"><br><br>
        </div>
    </div>
    <div style="display: inline-block;position:absolute;width: 40%;">
        <div> <br>
            <span style="font-weight: bold;font-size: 30px;">Order summary </span> <br><br>
        </div>
        <div style="background-color: rgba(252, 248, 247, 0.801);font-size: 22px;color:rgb(85, 79, 79);font-weight: bold;"> 
            NFT purchase:  <span id="name" style="font-size: 30px;margin-left:5%;font-weight: bold;color: rgba(74, 77, 76, 0.808);"></span> <br>
            Total Price:   <span id="price" style="font-size: 30px;margin-left:13%;font-weight: bold;color: rgba(79, 79, 236, 0.582);"></span> $
        </div>
        <button class="purchase" type="submit" onclick="check()"><span style="color: whitesmoke;font-size: 150%;">Purchase</span></button>
        

    </div>

</div>
    </body>
    <script>
        function check(){
            
            if(document.getElementById("n").value==""||document.getElementById("m").value==""||document.getElementById("mess").value=="")
            {
                alert("Please fill all personal details");
            }
           else if(document.getElementById("crd").checked==true){
                if (document.getElementById("noc").value==""||document.getElementById("cv").value==""){
                    alert("Credit card details can not be empty.");
                }
                else{
                alert("Thank you. Your order has been placed.");
                location.replace("p10placed.php");
                }
            }
            else if(document.getElementById("ptm").checked==true){
                if (document.getElementById("pn").value==""){
                    alert("PAYTM number can not be empty");
                }
                else if(document.getElementById("pn").value>9999999999 || document.getElementById("pn").value<1000000000){
                    alert("Incorrect phone number");
                }
                else{
                alert("Thank you. Your order has been placed.");
                location.replace("p10placed.php");
            }
           }
            else{
                alert("Thank you. Your order has been placed.");
                location.replace("p10placed.php");
            }
        }
    </script>
</html>
