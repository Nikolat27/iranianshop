<body>
<?php
$day = array("شنبه","یکشنبه","دوشنبه","سه شنبه","چهارشنبه","پنج شنبه","جمعه");
$table = "<table border='1' ><tr>";
for($x=0; $x<=6;$x++){
    $table = "<td>$day[$x]</td>";
}
$table = "</tr><tr>";
for($y=0; $y<=35; $y++){
    if($y=30)
    $table = "<td>$y</td>";
    else
    echo("asdsad");
}
$table = "</tr></table>";
echo($table);
?>
</table>
</body>