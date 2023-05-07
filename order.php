<?php
include("include/header.php");
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
    exit("خطایی به شرع زیر رخ داده است" . mysqli_connect_error());
$pro_code = 0;
if (isset($_GET['id']))
    $pro_code = $_GET['id'];
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
?>
    <br>
    <span style="color:red;"><b>
            برای خرید پستی محصول انتخاب شده باد وارد سایت شوید
        </b>
    </span>
    <br><br>
    در صورتی که عضو فروشگاه هستید برای ورود
    <a href="login.php" style="text-decoration: none;"><span style="color: blue;">
            <b>
                اینجا
            </b>
        </span></a>
    کلیک کنید
    <br><br>
    و در صورتی که عضو نیستید برای ثبت نام در سایت
    <a href="register.php" style="text-decoration: none;"><span style="color: green;">
            <b>اینجا</b>
        </span></a>
    کلیک کنید
    <br><br>
<?php
    exit();
}
$query = "SELECT * FROM products WHERE pro_code='$pro_code'";
$result = mysqli_query($link, $query);
?>
<form name="order" action="action_order.php" method="POST">
    <table style="width: 100%;" border="1px">
        <tr>
            <td style="width: 60%;">
                <?php

                if ($row = mysqli_fetch_array($result)) {
                ?>
                    <br>

                    <table style="width: 100%;" border="0" style="margin-left: auto;margin-right:auto;">
                        <tr>
                            <td style="width: 22%;">کد کالا <span style="color: red;">*</span></td>
                            <td style="width: 78%;"> <input type="text" id="pro_code" name="pro_code" value="
                            <?php echo ($pro_code); ?>" style="background-color: lightgray;" readonly> </td>
                        </tr>
                        <tr>
                            <td>نام کالا <span style="color: red;">*</span></td>
                            <td> <input type="text" id="pro_name" name="pro_name" value="
                            <?php echo ($row['pro_name']); ?>" style="background-color: lightgray;" readonly> </td>
                        </tr>
                        <tr>
                            <td>تعداد یا مقدار درخواستی <span style="color: red;">*</span></td>
                            <td> <input type="text" style="text-align: left;" id="pro_qty" name="pro_qty" onchange="calc_price();"> </td>
                        </tr>
                        <tr>
                            <td>قیمت واحد کالا<span style="color:red;">*</span></td>
                            <td><input type="text" style="text-align: left; background-color:lightgray;" id="pro_price" name="pro_price" value="<?php echo $row['pro_price'];  ?>" readonly>ریال</td>
                        </tr>
                        <tr>
                            <td>مبلغ قابل پرداخت<span style="color:red;">*</span></td>
                            <td>
                                <input type="text" style="text-align: left; background-color:lightgray;" id="total_price" name="total_price" value="0" readonly>ریال
                            </td>
                        </tr>
                        <!--cal script-->
                        <script type="text/javascript">
                            function calc_price() {
                                var pro_qty = <?php echo $row['pro_qty']; ?>;
                                var price = document.getElementById('pro_price').value;
                                var count = document.getElementById('pro_qty').value;
                                if (count > pro_qty) {
                                    alert('تعداد موجودی انبار کمتر از درخواست شما است !');
                                    document.getElementById('pro_qty').value = 0;
                                    count = 0;
                                }
                                if (count == 0 || count == '')
                                    total_price = 0;
                                else
                                    total_price = count * price;
                                document.getElementById('total_price').value = total_price;
                            }
                        </script>

                        <?php
                        $query = "SELECT * FROM `users` WHERE username='{$_SESSION['username']}'";
                        $result = mysqli_query($link, $query);
                        $user_row =  mysqli_fetch_array($result);
                        ?>
                        <tr>
                            <td><br><br><br></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">نام خریدار<span style="color: red;"> *</span></td>
                            <td style="width: 40%;">
                                <input type="text" id="realname" name="realname" value="<?php echo $user_row['realname']; ?>" style="text-align: left; background-color:lightgray;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">ایمیل <span style="color: red;"> *</span></td>
                            <td style="width: 40%;">
                                <input type="text" id="email" name="email" value="<?php echo $user_row['email']; ?>" style="text-align: left; background-color:lightgray;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">شماره تلفن همراه <span style="color: red;"> *</span></td>
                            <td style="width: 40%;">
                                <input type="text" id="mobile" name="mobile" value="" style="text-align: left;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">آدرس دقیق پستی جهت دریافت محصول<span style="color: red;"> *</span></td>
                            <td style="width: 40%;">
                                <textarea id="address" name="address" style="text-align: right;" cols="30" rows="3" wrap="virtual"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><br><br><br><br></td>
                            <td><input type="button" value="خرید محصول" onclick="check_input();"></td>
                        </tr>
                    </table>
            </td>
            <td>
                <!-- script -->
                <script type="text/javascript">
                    function check_input() {
                        var r = confirm("از اطلاعات وارد شده اطمینان دارید ؟");
                        if (r == true) {
                            var validation = true;
                            var count = document.getElementById('pro_qty').value;
                            var mobile = document.getElementById('mobile').value;
                            var address = document.getElementById('address').value;
                            if (count == 0 || count == '')
                                validation = false;
                            if (mobile.length < 11)
                                validation = false;
                            if (address.length < 15)
                                validation = false;

                            if (validation)
                                document.order.submit();
                            else
                                alert('برخی از ورودی ها فرم سفارش محصول به درستی پر نشده اند.');

                        }
                    }
                </script>


                <table>
                    <tr>
                        <td style="border-style: dotted dashed;vertical-align:top;width:33%;">
                            <h4 style="color: brown;"> <?php echo $row['pro_name']; ?> </h4>
                            <img src="image/products/<?php echo $row['pro_image']; ?>" width="250px" height="120px" alt="">
                            <br>
                            قیمت : <?php echo ($row['pro_price']); ?>&nbsp; T
                            <br>
                            تعداد موجودی : <span style="color: red;"><?php echo ($row['pro_qty']); ?></span>
                            <br>
                            توضیحات : <span style="color: green;"><?php
                                                                    $count = strlen($row['pro_detail']);
                                                                    echo (substr($row['pro_detail'], 0, (int)($count / 4))); ?></span>
                            <br><br>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
<?php
                }
                include('include/footer.php');
?>