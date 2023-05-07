<?php
include("include/header.php");

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true))
{
?>
<script type="text/javascript">
    window.alert("You are not admin!");
    location.replace("index.php");
</script>
<?php
}
?>
<?php
$link = mysqli_connect("localhost", "root", "", "shop_db");
$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$pro_qty = $_POST['pro_qty'];
$pro_price = $_POST['pro_price'];
$total_price = $_POST['total_price'];
$realname = $_POST['realname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$username = $_SESSION['username'];

$query = "INSERT INTO `orders`(`id`, `username`, `pro_code`, `pro_qty`, `pro_price`, `mobile`, `address`, `trackcode`, `state`)
VALUES
('0','$username',
'$pro_code','$pro_qty','$pro_price','$mobile','$address','000000000000000000000000','0')";
mysqli_set_charset($link, "utf8");

if(mysqli_query($link, $query) === true){
    echo("<p style='color: green;'><br/><b>سفارش شما با موفقیت در سامانه ثبت شد</b></p>");

    echo("<p style='color: red;'><br/><b>کاربر گرامی آقا/خانم $realname </b></p>");
    echo("<p style='color: red;'><br/><b>محصول $pro_name با کد $pro_code به تعداد/مقدار $pro_qty با قیمت پایه $pro_price تومن را سفارش داده اید</b></p>");

    echo("<p style='color: red;'><br/><b>مبلغ قابل پرداخت برای سفارش ثبت شده $total_price ریال است </b></p>");


    echo("<p style='color: blue;'><b>پس از بررسی سفارش و تایید آن با شما تماس گرفته خواهد شد</b></p>");

    echo("<p style='color: blue;'><b>محصول خریداری شده از طریق پست جمهوری اسلامی
    ایران طبق آدرس درج شده ارسال خواهد شد </b></p>");

    echo("<p style='color: blue;'><b>در هنگام تحویل گرفتن محصول آن را بررسی و از صحت و سالم بودن آن اطمینان حاصل کنید سپس مبلغ را طبق فاکتور ارایه شده به مامور پست تحویل دهید</b></p>");
    

    $query = "UPDATE products SET pro_qty = pro_qty-$pro_qty WHERE pro_code='$pro_code'";
    $result = mysqli_query($link, $query);
}
else
{
    echo mysqli_error($link);
    echo mysqli_errno($link);
    echo("<p style='color: red;'><b>خطایی در دیتابیس رخ داده است</b></p>");
}
?>

<?php
mysqli_close($link);
include("include/footer.php");
?>
