<?php
include('include/header.php');
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
?>
  <script type="text/javascript">
    location.replace("index.php")
  </script>
<?php }
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
  exit("خطایی به شرع زیر رخ داده است" . mysqli_connect_error());
$url = $pro_code = $pro_name = $pro_qty = $pro_price = $pro_image = $pro_detail = "";
$btn_caption = "افزودن کالا";
if (isset($_GET['action']) && $_GET['action'] == 'EDIT') {
  $id = $_GET['id'];
  $query = "SELECT * FROM products WHERE pro_code='$id'";
  $result = mysqli_query($link, $query);
  if ($row =  mysqli_fetch_array($result)) {
    $pro_code = $row['pro_code'];
    $pro_name = $row['pro_name'];
    $pro_qty = $row['pro_qty'];
    $pro_price = $row['pro_price'];
    $pro_image = $row['pro_image'];
    $pro_detail = $row['pro_detail'];
    $url = "?id=$pro_code&action=EDIT";
    $btn_caption = "ویرایش کالا";
  }
}

?>
<br>
<form name="add_products" action="action_admin_products.php<?php if (!empty($url)) echo $url; ?>" method="POST" enctype="multipart/form-data">
  <table style="width:100%;" border="0" style="margin-left:auto;margin-right:auto;">
    <tr>
      <td tyle="width:22%;">کد کالا <span style="color:red;">*</span></td>
      <td style="width:78%;"> <input type="text" id="pro_code" name="pro_code" value="<?php echo ($pro_code) ?>"> </td>
    </tr>
    <tr>
      <td tyle="width:22%;">نام کالا<span style="color:red;">*</span></td>
      <td style="width:78%;"> <input type="text" id="pro_name" name="pro_name" value="<?php echo ($pro_name) ?>"> </td>
    </tr>
    <tr>
      <td tyle="width:22%;">موجودی کالا<span style="color:red;">*</span></td>
      <td style="width:78%;"> <input type="text" id="pro_qty" name="pro_qty" value="<?php echo ($pro_qty) ?>"> </td>
    </tr>
    <tr>
      <td tyle="width:22%;">قیمت کالا<span style="color:red;">*</span></td>
      <td style="width:78%;"> <input type="text" id="pro_price" name="pro_price" value="<?php echo ($pro_price) ?>">&nbsp; T </td>
    </tr>
    <tr>
      <td tyle="width:22%;">آپلود تصویر<span style="color:red;">*</span></td>
      <td style="width:78%;"> <input type="file" id="pro_image" name="pro_image" size="30">
        <?php if (!empty($pro_image)) echo "<img src='image/products/$pro_image' width='80' height='40'"; ?>
      </td>
    </tr>
    <td tyle="width:22%;">توضیحات تکمیلی<span style="color:red;">*</span></td>
    <td style="width:78%;"> <textarea cols="45" rows="10" warp="vitual" type="text" id="pro_detail" name="pro_detail"><?php echo ($pro_detail) ?></textarea </td>
<br>
    <input type="submit" value="<?php echo ($btn_caption) ?>" >
    &nbsp;&nbsp;&nbsp;
 <input type="reset"  value="ریست ">
  </table>
</form>

<?php
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);
?>
 <br>
<table border="1px" style="width: 100%;" >
<tr>
<td>کد کالا</td>
<td>نام کالا</td>
<td>موجودی کالا</td>
<td>قیمت کالا</td>
<td>تصویر کالا</td>
<td> ابزار مدیریتی</td>
</tr>
<?php while ($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row['pro_code']; ?></td>
<td><?php echo $row['pro_name']; ?></td>
<td><?php echo $row['pro_qty']; ?></td>
<td><?php echo $row['pro_price']; ?> &nbsp T </td>
<td><img src="image/products/<?php echo $row['pro_image']; ?>" width="150px" height="50px" alt=""></td>
<td>
<b><a href="action_admin_products.php?id=<?php echo $row['pro_code']; ?>&action=DELETE" style="text-decoration: none;">حذف</a></b>
&nbsp;|&nbsp;
<b><a href="admin_products.php?id=<?php echo $row['pro_code']; ?>&action=EDIT" style="text-decoration: none;">ویرایش</a></b>
</td>
</tr>
<?php
}
?>
</table>

<?php
include('include/footer.php');
?>