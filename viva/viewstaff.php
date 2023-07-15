<?php
include './adminheader.php';
include './reportmenu.php';
if(isset($_GET['did'])) {
    $id = $_GET['did'];
    mysqli_query($link, "delete from staff where email='$id'");
}

$result = mysqli_query($link, "select * from staff");
    echo "<table class='center_tab'><thead><tr><th colspan='9'><h4>STAFF  INFO</h4>";
    echo "<tr><th>Name<th>Gender<th>Address<th>City<th>Experience<th>Mobile<th>Email<th>Pwd<th>Task";
    echo "<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $k=>$r) {
                if($k==7)
                    echo "<td>***";
                else
                    echo "<td>$r";
            }
            echo "<td><a href='viewstaff.php?did=$row[6]' onclick=\"javascript:return confirm('Are You Sure to Remove Staff Info ?')\">Del</a>";
        }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>