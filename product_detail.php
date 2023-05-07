<?php
include("include/header.php");
$link = mysqli_connect("localhost", "root", "", "shop_db");
if(mysqli_connect_errno())
{
    exit("خطایی با شرح زیر رخ داده است: ". mysqli_connect_error());
}

$pro_code = 0;
if(isset($_GET['id']))
$pro_code = $_GET['id'];

$query = "SELECT * FROM products WHERE pro_code='$pro_code'";
$result = mysqli_query($link, $query);
?>

<table style="width: 100%;" border="1px" >
<tr>
<?php
if($row = mysqli_fetch_array($result))
{
    ?>
    <td style="border-style: dotted dashed; vertical-align: top; width: 33%">
    <h4 style="color: #E52B50;"><?php echo($row['pro_name']) ?></h4>
    <img src="image/products/<?php echo($row['pro_image'])?>" width="250px;" height="150px;" />
    <br />
    قیمت : <?php echo($row['pro_price']) ?> &nbsp; T
    <br />
    تعداد موجودی : <span style="color :#E52B50;"><?php echo($row['pro_qty']); ?></span>
    <br />
    توضیحات: <span style="color :#7FFFD4;"><?php echo($row['pro_detail']); ?></span>
    <br /><br />
    
    <b>
        <a href="order.php?id=<?php echo($row['pro_code']) ?>"style="text-decoration: none;">
        سفارش و خرید پستی
        </a>
    </b>
    </td>
    <?php
} //if finish
?>

</tr>
</table>

<?php
include("include/footer.php");
?>

