<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Page</title>
</head>
<body>
    <?php
    unset($_SESSION['counter']);
    ?>
</body>
</html>