<?php
session_start();
if(isset($_SESSION['counter'])){
    $_SESSION['counter'] += 1;
}
else{
    $_SESSION['counter'] = 1;
}
$msg = "You have visited this page ".$_SESSION['counter'];
$msg .= " in this session";
?>

<title>Visit Page</title>

<?php
echo($msg);
?>