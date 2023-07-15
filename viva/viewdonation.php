<?php
include './adminheader.php';
include './reportmenu.php';
/*
if(isset($_GET['did'])) {
    $id = $_GET['did'];
    $amount = $_GET['amount'];
    mysqli_query($link, "delete from expenses where id=$id") or die(mysqli_error($link));
    mysqli_query($link, "update balance set amount=amount+$amount") or die(mysqli_error($link));
}
*/
$result = mysqli_query($link, "select d.id,d.donorid,name,amount,pmode,bank,chqno,dt from donation d,donor r where donorid=email order by dt");
    echo "<table class='center_tab'><thead><tr><th colspan='7'><h4>RECEIVED DONATIONS</h4>";
    echo "<tr><th>DonorId<th>Name<th>Amount<th>Mode<th>Bank<th>Chq.No.<th>Date";
    echo "<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            foreach($row as $k=>$r) {
                if($k!=0)
                    echo "<td>$r";
            }
            //echo "<td><a href='viewdonation.php?did=$row[0]&amount=$row[5]' onclick=\"javascript:return confirm('Are You Sure to Delete Expenses Entry ?')\">Del</a>";
        }
    echo "</tbody></table>";
mysqli_free_result($result);
include './footer.php';
?>