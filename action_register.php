
<?php
include("include/header.php");

if (isset($_POST['realname']) && !empty($_POST['realname']) &&
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) &&  !empty($_POST['password']) &&
    isset($_POST['repassword']) &&  !empty($_POST['repassword']) &&
    isset($_POST['email']) &&  !empty($_POST['email'])){
        $realname = $_POST['realname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $email = $_POST['email'];
    }else
    exit("Some fields are empty!");
if($password != $repassword)
 exit("password and repassword arent same!");

if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
 exit("Email is invalid!");
    
?>
<div dir="ltr" style="text-align: left;">
<?php
echo("realname=".$realname."<br/>");
echo("username=".$username."<br/>");
echo("password=".$password."<br/>");
echo("repassword=".$repassword."<br/>");
echo("email=".$email."<br/>");
?>
</div>
<!-- HOW to connect to mysql: first declare a variable after that add this arguments:
(servername,mysql username , mysql password, database name)-->
<?php
$link = mysqli_connect("localhost","root","","shop_db");
if(mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است:".mysqli_connect_error());


$query = "INSERT INTO users(realname, username, password, email,type) VALUES
('$realname','$username','$password','$email','0')";


if(mysqli_query($link,$query) === true)
   echo("<p style='color: #7FFFD4'><b>".$realname.
   "گرامی عضویت شما با نام کاربری ".$username.
   "در فروشگاه با موفقیت انجام شد "."</br></p>");
else
   echo("<p style='color: red'><b>عضویت شما در فروشگاه انجام نشد</b></p>");

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);

mysqli_close($link);
?>


<?php
include("include/footer.php")
?>


