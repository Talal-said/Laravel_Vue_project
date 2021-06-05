<?php

$today = date("d-m-Y"); // OR m/d/Y
echo $today_timestamp = strtotime("-3 hours", strtotime($today ." 12:00:00AM")) * 1000;
echo "<br>";
echo "1622840400000" //Element-ui date input timestamp value for 05/06/2021;

?>

<script>
    var d = new Date(1620248400000).toLocaleString(); // output: '5/6/2021, 12:00:00 AM'
    document.getElementById("demo").innerHTML = d;
</script>
