<?php
include './adminheader.php';
include './reportmenu.php';
if(isset($_GET['did'])) {
    $id = $_GET['did'];
    mysqli_query($link, "delete from newperson where id=$id");
}

$result = mysqli_query($link, "select * from newperson order by joindt");
    echo "<table class='center_tab' style='width:500px;'><thead><tr><th colspan='14'><h4>ALL PERSON INFO</h4>";
    echo "<tr><th>Id<th>Name<th>Gender<th>Age<th>Address<th>City<th>Occupation<th>Pension<th>Relative<th>Relation<th>Mobile<th>Reason<th>JoinedOn<th>Task";
    echo "<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $k=>$r) {                
                    echo "<td>$r";
            }
            echo "<td><a href='viewall.php?did=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Delete Person ?')\">Del</a>";
        }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>