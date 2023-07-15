<?php
include './adminheader.php';
include './reportmenu.php';
if(isset($_GET['did'])) {
    $id = $_GET['did'];
    mysqli_query($link, "delete from donor where email='$id'");
}

$result = mysqli_query($link, "select * from donor");
    echo "<table class='center_tab'><thead><tr><th colspan='7'><h4>DONORS  INFO</h4>";
    echo "<tr><th>Name<th>Address<th>City<th>Occupation<th>Mobile<th>Email<th>Task";
    echo "<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $k=>$r) {
                if($k!=1 && $k!=7)
                    echo "<td>$r";
            }
            echo "<td><a href='viewdonors.php?did=$row[6]' onclick=\"javascript:return confirm('Are You Sure to Delete Donor Info ?')\">Del</a>";
        }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>