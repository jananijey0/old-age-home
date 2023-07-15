<?php
include './adminheader.php';
include './reportmenu.php';
if(isset($_GET['did'])) {
    $id = $_GET['did'];
    $amount = $_GET['amount'];
    mysqli_query($link, "delete from expenses where id=$id") or die(mysqli_error($link));
    mysqli_query($link, "update balance set amount=amount+$amount") or die(mysqli_error($link));
}

echo "<div class='center'>Select Expense Cateogry <select name='expcat' onchange='call3(this.value)'><option value=''>--Select Expense Catgory--</option><option value='all'>All</option>";
$res1 = mysqli_query($link, "select distinct category from expenses") or die(mysqli_error($link));
    while($row1 = mysqli_fetch_row($res1)) {
        echo "<option value='$row1[0]'>$row1[0]</option>";
    }
mysqli_free_result($res1);
echo "</select>";
echo "</div>";
echo "<div id='expenses_report'></div>";
    /*echo "<div id='expenses_report'><table class='center_tab'><thead><tr><th colspan='7'><h4>EXPENSES</h4>";
    echo "<tr><th>Id<th>Date<th>Paid To<th>Category<th>Description<th>Amount<th>Task";
    echo "<tbody>";
    $result = mysqli_query($link, "select * from expenses");
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $k=>$r) {
                    echo "<td>$r";
            }
            echo "<td><a href='viewexpenses.php?did=$row[0]&amount=$row[5]' onclick=\"javascript:return confirm('Are You Sure to Delete Expenses Entry ?')\">Del</a>";
        }
        mysqli_free_result($result);
    echo "</tbody></table></div>";*/

include './footer.php';
?>