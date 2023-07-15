<?php
include './header.php';
?>
<div style="padding: 20px 0px">

<form name="f" action="register.php" method="post" onsubmit="return check()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><h4>DONOR REGISTRATION</h4></th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>Name</th>
		<td><input type="text" name="name" required autofocus></td>
	    </tr>
            <tr>
		<th>Address</th>
		<td><textarea name="addr" required cols="30" rows="3"></textarea></td>
	    </tr>
            <tr>
		<th>City</th>
		<td><input type="text" name="city" required></td>
	    </tr>
            <tr>
		<th>Mobile</th>
		<td><input type="text" name="mobile" maxlength="10" required></td>
	    </tr>
            <tr>
		<th>Profession</th>
		<td>
                    <select name="profession">
			<option value="Business">Business</option>
                        <option value="Private">Private</option>
                        <option value="Government">Government</option>
		    </select>
                </td>
	    </tr>
            <tr>
		<th>EMail Id</th>
		<td>
                    <input type="text" name="email" required>
                    <input type="hidden" name="pwd" value="pwd" required>
                    <input type="hidden" name="cpwd" value="pwd" required>
                </td>
	    </tr>
	    <!--tr>
		<th>Password</th>
		<td><input type="password" name="pwd" required></td>
	    </tr>
            <tr>
		<th>Confirm Pwd</th>
		<td><input type="password" name="cpwd" required></td>
	    </tr-->
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

</div>
<?php
include './footer.php';
?>