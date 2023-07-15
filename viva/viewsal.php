<?php
include './adminheader.php';
include './reportmenu.php';
if(isset($_GET['did'])) {
    $id = $_GET['did'];
    mysqli_query($link, "delete from staffsal where staffid='$id'");
}

$result = mysqli_query($link, "select staffid,name,year,month,absent,basic,da,hra,ta,pf,gross,net from staffsal,staff where staffid=email");
    echo "<table class='center_tab'><thead><tr><th colspan='13'><h4>STAFF  SALARY</h4>";
    echo "<tr><th>StaffId<th>Name<th>Year<th>Month<th>Absent<th>Basic<th>DA<th>HRA<th>TA<th>PF<th>Gross<th>Net<th>Task";
    echo "<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $k=>$r) {                
                    echo "<td>$r";
            }
            echo "<td><a href='viewsal.php?did=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Remove Salary Info ?')\">Del</a>";
        }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>