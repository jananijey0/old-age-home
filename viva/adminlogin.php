<?php
include './header.php';
?>
<div style="padding: 20px 0px">
<?php
if(!isset($_POST['submit'])) {
?>
<a name="login"></a>
<form name="f" action="adminlogin.php" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><h4>ADMIN LOGIN</h4></th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>UserId</th>
		<td><input type="text" name="userid" required autofocus></td>
	    </tr>
	    <tr>
		<th>Password</th>
		<td><input type="password" name="pwd" required></td>
	    </tr>
	    <!--tr>
		<th>Type</th>
		<td>
		    <select name="utype">
			<!--option value="user">User</option>
			<option value="admin">Admin</option>
		    </select>
		</td>
	    </tr-->
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit" value="Login">
                    <br><br>		    
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);    
        $result = mysqli_query($link, "select * from admin where userid='$userid' and pwd='$pwd'") or die(mysqli_error($link));
            if(mysqli_num_rows($result)>0) {
                $_SESSION['adminuserid']= $userid;
                header("Location:adminhome.php");
            } else {
                echo "<div class='center'>Invalid UserId/Password...!<br><a href='adminlogin.php'>Back</a></div>";
            }
        mysqli_free_result($result);
}
?>
</div>
<?php
include './footer.php';
?>