<?php
include './db.php';
$id = $_GET['id'];
    $result = mysqli_query($link, "select name,addr,city,mobile from donor where email='$id'");
    $row = mysqli_fetch_row($result);
    echo "$row[0]~$row[1]~$row[2]~$row[3]";
    mysqli_free_result($result);
?>