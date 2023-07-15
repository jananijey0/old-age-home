<?php
include './adminheader.php';
echo "<div class='center' style='margin:20px auto;'><a href='expenses.php'>Expenses</a> | <a href='medexpenses.php'>Medical Expenses</a></div>";
if(!isset($_POST['submit'])) {
    $result = mysqli_query($link, "select id from newperson") or die(mysqli_error($link));
?>
<form name="f" action="medexpenses.php" method="post" onsubmit="">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><h4>MEDICAL EXPENSES</h4></th>
	    </tr>
	</thead>
	<tbody>
            <tr>
            <th>Select Member Id</th>
            <td>
                <select name="id" required onchange="call2(this.value)">
                    <option value="">--Select Id--</option>
                    <?php
                    while($row = mysqli_fetch_row($result)) {
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                    mysqli_free_result($result);
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Name</th>
            <td><input type="text" name="pname" id="pname" required readonly></td>
        </tr>
        <tr>
            <th>Paid To</th>
            <td><input type="text" name="payee" required autofocus></td>
        </tr>                    
        <tr>
            <th>Description</th>
            <td><textarea name="descr" required rows="3" cols="24"></textarea></td>
        </tr>
        <tr>
            <th>Amount</th>
            <td><input type="text" name="amount" required></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><input type="text" name="dt" value="<?php echo date('Y-m-d',time())?>" required></td>
        </tr>    
            	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit" value="Store Medical Expenses">
                    <br><br>
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {   
    $memberid = $_POST['id'];
    $payee = $_POST['payee'];    
    $descr = $_POST['descr'];
    $amt = $_POST['amount'];
    $dt = $_POST['dt'];
    
    $result = mysqli_query($link, "select amount from balance");
    $row = mysqli_fetch_row($result);
    if($row[0]-$amt>=0) {
        mysqli_query($link, "insert into medexpenses(dt,memberid,payee,descr,amount) values('$dt',$memberid,'$payee','$descr',$amt)") or die(mysqli_error($link));
        mysqli_query($link, "update balance set amount=amount-$amt") or die(mysqli_error($link));
        echo "<div class='center'>Medical Expenses Stored...!</div>";
    } else {
        echo "<div class='center'>Sorry...! Insufficient Funds...!<br> Cannot make this Payment...! <br>Available Amount is : $row[0]/- Only...!</div>";
    }
    mysqli_free_result($result);
    
    echo "<div class='center'><br><a href='medexpenses.php'>Back</a></div>";
}
include './footer.php';
?>