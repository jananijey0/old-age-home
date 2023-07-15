<?php
include './adminheader.php';
include './reportmenu.php';
if(isset($_GET['did'])) {
    $id = $_GET['did'];
    $amount = $_GET['amount'];
    mysqli_query($link, "delete from medexpenses where id=$id") or die(mysqli_error($link));
    mysqli_query($link, "update balance set amount=amount+$amount") or die(mysqli_error($link));
}

$result = mysqli_query($link, "select m.id,name,m.dt,memberid,m.payee,m.descr,m.amount  from medexpenses m,newperson n where n.id=m.id");
    echo "<table class='center_tab'><thead><tr><th colspan='8'><h4>MEDICAL EXPENSES</h4>";
    echo "<tr><th>Id<th>Name<th>Date<th>Member Id<th>Paid To<th>Description<th>Amount<th>Task";
    echo "<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $k=>$r) {
                    echo "<td>$r";
            }
            echo "<td><a href='viewmedexpenses.php?did=$row[0]&amount=$row[6]' onclick=\"javascript:return confirm('Are You Sure to Delete Medical Expenses Entry ?')\">Del</a>";
        }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>