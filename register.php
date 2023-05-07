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
<script type="text/javascript">
<!--
    function check_empty()
    {
        var username="";
        username=document.getElementById("username").value;
        if (username=="")
         alert("You must enter your username!")
        else
        {
            var r = confirm("Are you sure of the correctness of the entered information");
            if (r == true){
                document.register.submit();
            }
        }       
    }
-->    
</script>
<br />
<form name="register" action="action_register.php" method="POST">
    <table style ="width 50%;" border="0" style="margin-left: auto;margin-right =auto;">

    <tr>
        <td style="width: 40%; color: white;">RealName<span style="color:red;">*</span></td>
        <td style="width: 60%;"><input type="text" id="realname" name="realname" /></td>
    </tr>

    <tr>
        <td style="color: white">Username<span style = "color: red;">*</span></td>
        <td><input type="text" style="text-align: left;" id="username" name="username"/></td>
    </tr>

    <tr>
        <td style="color: white">Password<span style = "color: red;">*</span></td>
        <td><input type="password" style="text-align: left;" id="password" name="password"/></td>
    </tr>

    <tr>
        <td style="color: white">Repeat Password<span style = "color: red;">*</span></td>
        <td><input type="password" style="text-align: left;" id="repassword" name="repassword"/></td>
    </tr>

    <tr>
        <td style="color: white">Email<span style = "color: red;">*</span></td>
        <td><input type="test" style="text-align: left;" id="email" name="email"/></td>
    </tr>

    <tr>
        <td><br /><br /></td>
        <td><input type="button" class="button-29" value="Sign up" onclick="check_empty();" />
            &nbsp;&nbsp;&nbsp;
            <input type="reset" class="button-29" value="Reset"/></td>
    </tr>
    </table>
</form>
<?php
include("include/footer.php")
?> 

    