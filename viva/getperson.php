<?php
include './db.php';
$id = $_GET['id'];
    $result = mysqli_query($link, "select name from newperson where id=$id");
    $row = mysqli_fetch_row($result);
    echo "$row[0]";
    mysqli_free_result($result);
?>