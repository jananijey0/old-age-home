<?php
include './adminheader.php';
if(!isset($_POST['submit'])) {
?>
<form name="f" action="adminhome.php" method="post" onsubmit="return validate_newperson()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><h4>NEW RESIDENT</h4></th>
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
		<th>Age</th>
		<td><input type="text" name="age" required></td>
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
		<th>Occupation</th>
		<td><input type="text" name="occupation" value="NIL" required></td>
	    </tr>
                    <tr>
		<th>Pension Details</th>
		<td><input type="text" name="pension" value="NIL" required></td>
	    </tr>
                    <tr>
		<th>Relative Name</th>
		<td><input type="text" name="relative" value="NIL" required></td>
	    </tr>
                    <tr>
		<th>Relation</th>
                                <td>
                                    <select name="relation">
                                        <option value="NIL">NIL</option>
                                        <option value="son">Son</option>
                                        <option value="daughter">Daughter</option>
                                        <option value="husband">Husband</option>
                                        <option value="wife">Wife</option>
                                        <option value="other">Other</option>
                                    </select>
                                </td>
	    </tr>
            <tr>
                <th>Relative Mobile</th>
                <td><input type="text" name="mobile" maxlength="10" required></td>
            </tr>
	    <tr>
	<th>Reason</th>
                <td><textarea name="reason" cols="24" rows="3" required></textarea></td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit" value="Register">
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
    mysqli_query($link, "insert into newperson(name,gender,age,addr,city,occupation,pension,relative,relation,mobile,reason,joindt) values ('$name','$gender','$age','$addr','$city','$occupation','$pension','$relative','$relation','$mobile','$reason','$dt')");
    echo "<div class='center'>New Person Information Stored...!<br><a href='adminhome.php'>Back</a></div>";
}
include './footer.php';
?>