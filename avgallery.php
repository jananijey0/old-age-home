<?php
include './adminheader.php';
echo "<div class='center' style='margin:20px auto;'><a href='agallery.php'>Add to Gallery</a> | <a href='avgallery.php'>View Gallery</a></div>";

if(isset($_GET['did'])) {
    $id = $_GET['did'];
    mysqli_query($link, "delete from agallery where id='$id'") or die(mysqli_error($link));
}
$result = mysqli_query($link, "select id,fname from agallery order by id");
    echo "<table class='center_tab'><thead><tr><th colspan='3'><h4>GALLERY IMAGES</h4>";
    echo "<tr><th>Name<th>View Image<th>Task";
    echo "<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
                echo "<td>$row[1]<td><a href='$row[1]' target='_blank'>Click to View</a>";

            echo "<td><a href='avgallery.php?did=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
        }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>