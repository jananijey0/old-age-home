<?php
include './db.php';
$exp = $_GET['exp'];
if(strcasecmp($exp, "all")==0)
        $result = mysqli_query($link, "select * from expenses");
else
        $result = mysqli_query($link, "select * from expenses where category='$exp'");
    echo "<table class='center_tab' style='min-width:700px;'><thead><tr><th colspan='6'><h4>EXPENSES</h4>";
    echo "<tr><th>Date<th>Paid To<th>Category<th>Description<th>Amount<th>Task";
    echo "<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $k=>$r) {
                    if($k!=0)
                    echo "<td>$r";
            }
            echo "<td><a href='viewexpenses.php?did=$row[0]&amount=$row[5]' onclick=\"javascript:return confirm('Are You Sure to Delete Expenses Entry ?')\">Del</a>";
        }
    echo "</tbody></table>";
    mysqli_free_result($result);
?>