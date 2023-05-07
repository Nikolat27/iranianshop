<?php
include("include/header.php");
?>
<link rel="stylesheet" href="css/style.css">
<form name="cmtform" action="action_contact.php" method="POST">
    نام و نام خانوادگی<span style="color: red;">*</span>
    <input type="text" id="nametxt" name="nametxt">
    </br>
    آدرس ایمیل<span style="color: red;">*</span>
    <input type="text" id="ematxt" name="ematxt">
    </br></br></br>


    <label>متن پیام<span style="color: red;">*</span></label>
    </br>
    <textarea id="txtcmt" name="txtcmt" rows="3" cols="30">
    </textarea>

    </br></br>
    <button type="submit" name="sbtbtn" class="button-29">ارسال</button>
    <button type="reset" name="resbtn" class="button-29">جدید</button>
</form>





<?php
include("include/footer.php");
?>