<?php
include("include/header.php");
?>

<?php
if(isset($_POST['nametxt']) && !empty($_POST['nametxt']) &&
   isset($_POST['ematxt']) && !empty($_POST['ematxt']) &&
   isset($_POST['txtcmt']) && !empty($_POST['txtcmt']))
   {
    $fullname = $_POST['nametxt'];
    $email1 = $_POST['ematxt'];
    $comment1 = $_POST['txtcmt'];
   }
?>

<?php
$link = mysqli_connect("localhost", "root", "", "shop_db");
if(mysqli_connect_errno())
{
    exit(mysqli_connect_error());
}

$query = "INSERT INTO `contact`(`COMMENT1`, `fullname`, `email`)
VALUES(`$comment1`, `$fullname`,
 `$email1`)";
mysqli_set_charset($link, "utf8");
$result = mysqli_query($link, $query);

if(mysqli_query($link, $query) === true){
    echo("<p style='color: green;'>کاربر گرامی پیام شما با موفقیت ارسال شد!</p>");
}
else
{
    echo mysqli_error($link);
    echo mysqli_errno($link);
    echo("<p style='color: red;'><b>مشکلی رخ داده است!</b></p>");
}

mysqli_close($link);
?>

<?php
include("include/footer.php");
?>