<?php
include './adminheader.php';
echo "<div class='center' style='margin:20px auto;'><a href='expenses.php'>Expenses</a> &nbsp&nbsp&nbsp<a href='medexpenses.php'>Medical Expenses</a></div>";
if(!isset($_POST['submit'])) {        
?>
<form name="f" action="expenses.php" method="post" onsubmit="">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><h4>EXPENSES</h4></th>
	    </tr>
	</thead>
	<tbody>	
        <tr>
            <th>Paid To</th>
            <td><input type="text" name="payee" required autofocus></td>
        </tr>            
        <tr>
            <th>Category</th>
            <td>
                <select name="category">
                    <option value="Food">Food</option>
                    <option value="Clothes">Clothes</option>
                    <option value="Health Care">Health Care</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Kitchen Utensils">Kitchen Utensils</option>
                    <option value="Daily Expenses">Daily Expenses</option>
                    <option value="Electricity">Electricity</option>
                </select>
            </td>
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
		    <input type="submit" name="submit" value="Store Expense">
                    <br><br>
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {    
    $payee = $_POST['payee'];
    $category = $_POST['category'];
    $descr = $_POST['descr'];
    $amt = $_POST['amount'];
    $dt = $_POST['dt'];
    
    $result = mysqli_query($link, "select amount from balance");
    $row = mysqli_fetch_row($result);
    if($row[0]-$amt>=0) {
        mysqli_query($link, "insert into expenses(dt,payee,category,descr,amount) values('$dt','$payee','$category','$descr',$amt)") or die(mysqli_error($link));
        mysqli_query($link, "update balance set amount=amount-$amt") or die(mysqli_error($link));
        echo "<div class='center'>Expenses Stored...!</div>";
    } else {
        echo "<div class='center'>Sorry...! Insufficient Funds...!<br> Cannot make this Payment...! <br>Available Amount is : $row[0]/- Only...!</div>";
    }
    mysqli_free_result($result);
    
    echo "<div class='center'><br><a href='expenses.php'>Back</a></div>";
}
include './footer.php';
?>