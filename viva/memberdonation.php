<?php
include './adminheader.php';

if(!isset($_POST['submit'])) {
        $result = mysqli_query($link, "select email,name from donor") or die(mysqli_error($link));
?>
<form name="f" action="memberdonation.php" method="post" onsubmit="return validate_donation()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><h4>DONATION DETAILS</h4></th>
	    </tr>
	</thead>
	<tbody>
	<tr>
                <th>Select Donor</th>
                <td>
                    <select name="donorid" required onchange="call1(this.value)">
                        <option value="">--Select Donor Id--</option>
                        <?php
                            while($row = mysqli_fetch_row($result))
                                    echo "<option value='$row[0]'>$row[0]</option>";
                                mysqli_free_result($result);
                        ?>
                    </select>
                </td>
	</tr>
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" id="name" required readonly></td>
        </tr>    
        <tr>
            <th>Address</th>
            <td><textarea name="addr" id="addr" required readonly cols="24" rows="3"></textarea></td>
        </tr>    
        <tr>
            <th>City</th>
            <td><input type="text" name="city" id="city" required readonly></td>
        </tr>    
        <tr>
            <th>Mobile</th>
            <td><input type="text" name="mobile" id="mobile" required readonly></td>
        </tr>
        <tr>
            <th>Donation Amount</th>
            <td><input type="text" name="amount" required></td>
        </tr>    
        <tr>
            <th>Mode</th>
            <td><input type="radio" name="pmode" value="Cash" checked>Cash &nbsp;
            <input type="radio" name="pmode" value="Cheque">Cheque</td>
        </tr>    
        <tr>
            <th>Bank (If Cheque)</th>
            <td><input type="text" name="bank"></td>
        </tr>    
        <tr>
            <th>Cheque Number</th>
            <td><input type="text" name="chqno" maxlength="6"></td>
        </tr>    
        <tr>
            <th>Date</th>
            <td><input type="text" name="dt" value="<?php echo date('Y-m-d',time())?>" required></td>
        </tr>    
            	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit" value="Store Donation Info">
                    <br><br>
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {    
    $donorid = $_POST['donorid'];
    $amount = $_POST['amount'];
    $pmode = $_POST['pmode'];
    if(strcasecmp($pmode, "cheque")==0) {
        $bank = $_POST['bank'];
        $chqno = $_POST['chqno'];
    } else {
        $bank = "Nil";
        $chqno = "Nil";
    }
    $dt = $_POST['dt'];
    mysqli_query($link, "insert into donation(donorid,amount,pmode,bank,chqno,dt) values('$donorid',$amount,'$pmode','$bank','$chqno','$dt')") or die(mysqli_error($link));
    $result = mysqli_query($link, "select amount from balance");
    if(mysqli_num_rows($result)>0) {
        mysqli_query($link, "update balance set amount=amount+$amount");
    } else {
        mysqli_query($link, "insert into balance values($amount)");
    }
    mysqli_free_result($result);
    echo "<div class='center'>Donation Information Stored...!<br><a href='memberdonation.php'>Back</a></div>";
}
include './footer.php';
?>