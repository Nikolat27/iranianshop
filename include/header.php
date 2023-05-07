<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Iranian Shop</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
                .set_style_link{
                    text-decoration: none;
                    font-weight: bold;                
                }
                body{
                    background-image: url("purple_city.jpg");
                }
                                           
        </style>
    </head>
    <body>
        <div class= "divTable">
            <div class="divTableRow">
                <div class="divTableCell">
                    <header class="divTable">
                        <div class="divTableRow">
                            <div class="divTableCell"><img src="coding.png" alt="Sites logo" width="110px" height="65px"></div>
                        </div>
                    </header>
                    <nav class="divTable">
                        <ul class="divTableRow">
                            <li class="divTableCell"><a class="set_style_link" href="index.php">Main page</a></li>
                            <li class="divTableCell"><a class="set_style_link" href="register.php">Register</a></li>
                            <?php
                            if(isset($_SESSION['state_login']) && $_SESSION["state_login"] === true)
                            {
                                ?>
                                <li class="divTableCell"><a class="set_style_link" href="logout.php">Log out
                                <?php echo("({$_SESSION['realname']})") ?></a></li>
                                <?php
                            }   //if finish
                            else
                            {
                                ?>
                                <li class="divTableCell"><a class="set_style_link" href="login.php">Log in</a></li>
                                <?php
                            }   //else finish
                            ?>                            
                            <li class="divTableCell"><a class="set_style_link" href="sitetitles/Aboutme.html">About me</a></li>
                            <li class="divTableCell"><a class="set_style_link" href="contact.php">Contact me</a></li>
                            <?php
                               if(isset($_SESSION['state_login']) && $_SESSION['state_login'] === true && $_SESSION["user_type"] == 'admin')
                               {
                            ?>
                            <li class="divTableCell"><a class="set_style_link" href="admin_products.php">Products Managing</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                    <section class="divTable">
                        <section class="divTableRow">
                            <aside class="divTableCell" style="width: 25%; color: white;"> Site Possibilities</aside>
                            <section class="divTableCell" style="width:75%; color: white;">
