<?php
include("include/header.php");

// Connect to Database!
$link = mysqli_connect("localhost", "root", "", "shop_db");
// Check if Database connection give error or no!
if(mysqli_connect_errno())
{
    exit("خطایی با شرح زیر رخ داده است: ".mysqli_connect_error());
}

?>

<?php
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);
?>

<table style="width: 100%;" border="1px" >
<tr>
<?php
$counter = 0;
while($row = mysqli_fetch_array($result)){
    $counter += 1;
?>
<td style="border-style: dotted dashed; vertical-align: top; width: 33%;">
<h4 style="color: #E52B50;"><?php echo($row['pro_name']) ?> </h4>
<a href="products_detail.php?id = <?php echo($row['pro_code']) ?>">
<img src="image/products/<?php echo($row['pro_image']) ?>"width="250px" height="150px" />
</a>
<br />
قیمت : <?php echo($row['pro_price']) ?> &nbsp; T
<br />
تعداد موجودی : <span style="color: #E52B50;"><?php echo($row['pro_qty']) ?></span>
<br />
توضیحات : <span style="color: #7FFFD4;"> <?php echo(substr($row['pro_detail'],0,120)); ?> </span>
<br /><br />
<b><a href="product_detail.php?id= <?php echo($row['pro_code']) ?>" style="text-decoration: none;">توضیحات تکمیلی و خرید </a></b>
</td>

<?php
if($counter % 3 == 0)
echo("</tr><tr>");
} //End while loop

if($counter % 3 != 0)
echo("</tr>");
?>

</table>
<?php
include("include/footer.php");
?>                            					
                            
							
                            