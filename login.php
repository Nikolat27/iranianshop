<?php 
include("include/header.php");
if (isset($_SESSION["state_login"]) && $_SESSION['state_login'] === true){
?>  
<script type="text/javascript">
    location.replace("index.php");
</script>  
<?php
}
?>

<br/>
<!DOCTYPE html>
<html lang="UTF-8">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<link rel="stylesheet" href="css/style.css">
<form name="login" action="action_login.php" method="POST">
<body>
<table style="width: 50%;" border="0" style="margin-left: auto; margin-right: auto;">
<tr>
    <td>نام کاربری<span style="color :red">*</span></td>
    <td><input type="text" style="text-align: left;" id="username" name="username" /></td>
</tr>
<tr>
    <td>کلمه عبور<span style="color :red">*</span></td>
    <td><input type="password" style="text-align: left;" id="password" name="password" /></td>
</tr>
<tr>
    <td><br/><br/></td>
    <td><input type="submit" value="login" class="button-29"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="reset" class="button-29"/></td>
</tr>
</table>
</body>
</form>
</html>