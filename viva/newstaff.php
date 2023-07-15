<?php
include './adminheader.php';
echo "<div class='center' style='margin:20px auto;'><a href='newstaff.php'>New Staff</a> | <a href='staffsal.php'>Staff Salary</a></div>";
if(!isset($_POST['submit'])) {
?>
<form name="f" action="newstaff.php" method="post" onsubmit="return validate_staff()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><h4>NEW STAFF</h4></th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>Name</th>
		<td><input type="text" name="name" required autofocus></td>
	    </tr>
	    <tr>
		<th>Gender</th>
		<td><input type="radio" name="gender" value="Male" checked>Male &nbsp;
                    <input type="radio" name="gender" value="Female">Female</td>
	    </tr>                    
                    <tr>
		<th>Address</th>
                                <td><textarea name="addr" cols="24" rows="3" required></textarea></td>
	    </tr>
                    <tr>
		<th>City</th>
		<td><input type="text" name="city" required></td>
	    </tr>
                    <tr>
		<th>Experience (In Yrs)</th>
		<td><input type="text" name="exp" required></td>
	    </tr>                    
            <tr>
                <th>Mobile</th>
                <td><input type="text" name="mobile" maxlength="10" required></td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="text" name="email" required>
                    <input type="hidden" name="pwd" value="pwd" required>
                    <input type="hidden" name="cpwd" value="pwd" required>
                </td>
            </tr>
            <!--tr>
                <th>Password</th>
                <td><input type="password" name="pwd" value="pwd" required></td>
            </tr>
            <tr>
                <th>Confirm Pwd</th>
                <td><input type="password" name="cpwd" value="pwd" required></td>
            </tr-->
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit" value="Store">
                    <br><br>
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);   
    $dt = date('Y-m-d',time());
    mysqli_query($link, "insert into staff(name,gender,addr,city,exp,mobile,email,pwd) values('$name','$gender','$addr','$city','$exp','$mobile','$email','$pwd')");
    echo "<div class='center'>New Staff Information Stored...!<br><a href='newstaff.php'>Back</a></div>";
}
include './footer.php';
?>