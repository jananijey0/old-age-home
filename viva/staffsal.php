<?php
include './adminheader.php';
echo "<div class='center' style='margin:20px auto;'><a href='newstaff.php'>New Staff</a> | <a href='staffsal.php'>Staff Salary</a></div>";
if(!isset($_POST['submit'])) {
        $result = mysqli_query($link, "select email,name from staff") or die(mysqli_error($link));
?>
<form name="f" action="staffsal.php" method="post" onsubmit="validate_sal()">
    <table class="center_tab">
	<thead>
	    <tr>
                        <th colspan="2"><h4>STAFF PAYROLL</h4></th>
	    </tr>
	</thead>
	<tbody>
	<tr>
                <th>Select Staff</th>
                <td>
                    <select name="staffid">
                        <?php
                            while($row = mysqli_fetch_row($result))
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                mysqli_free_result($result);
                        ?>
                    </select>
                </td>
	</tr>
	    <tr>
		<th>Year & Month</th>
                <td>
                    <select name="year">
                        <?php
                        for($i=  date('Y',time()); $i>=2010; $i--)
                            echo "<option value='$i'>$i</option>";
                        ?>
                    </select>
                    <select name="month">
                        <?php
                        for($i=date('m',time()); $i>=1; $i--)
                            echo "<option value='$i'>$i</option>";
                        ?>
                    </select>
                </td>
	    </tr>                                        
                    <tr>
		<th>Absent (In Days)</th>
                                <td><input type="text" name="absent" value="0" size="5" required></td>
	    </tr>
                    <tr>
		<th>Basic Pay (per Day)</th>
                                <td><input type="text" name="basic" autofocus required></td>
	    </tr>                    
            	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit" value="Calculate Salary">
                    <br><br>
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {    
    $mth = array(31,28,31,30,31,30,31,31,30,31,30,31);
    $staffid = $_POST['staffid'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $absent = $_POST['absent'];
    $basic = $_POST['basic'];
    
    if($absent<0 || $absent>31) {
        echo "<div class='center'>Invalid Absent Days...!<br><a href='staffsal.php'>Back</a></div>";
    } else if($basic<0) {
        echo "<div class='center'>Invalid Basic Pay...!<br><a href='staffsal.php'>Back</a></div>";
    } else {
        $result = mysqli_query($link, "select * from staffsal where staffid='$staffid' and year=$year and month=$month");
        if(mysqli_num_rows($result)>0) {
            echo "<div class='center'>Salary Already Made for the Month...!<br><a href='staffsal.php'>Back</a></div>";
        } else {
            $present = $mth[$month-1]-$absent;
            $totbasic = $basic * $present;
            
            $da = $totbasic * .55;
            $hra = $totbasic * .35;
            $ta = $totbasic * .15;
            $pf = $totbasic * .07;
            $gross = $totbasic + $da + $hra + $ta;
            $net = $gross - $pf;
            $res1 = mysqli_query($link, "select name from staff where email='$staffid'");
            $row1 = mysqli_fetch_row($res1);
            mysqli_free_result($res1);
            mysqli_query($link, "insert into staffsal(staffid,year,month,absent,basic,da,hra,ta,pf,gross,net) values('$staffid',$year,$month,$absent,$basic,$da,$hra,$ta,$pf,$gross,$net)") or die(mysqli_error($link));
            echo "<table class='center_tab'><thead><tr><th colspan='2'>SALARY INFORMATION";
            echo "<tbody>";
            echo "<tr><th>Staff Id<td>$staffid";
            echo "<tr><th>Name<td>$row1[0]";
            echo "<tr><th>Year<td>$year";
            echo "<tr><th>Month<td>$month";
            echo "<tr><th>Absent<td>$absent";
            echo "<tr><th>Basic Pay<td>$totbasic";
            echo "<tr><th>DA<td>$da";
            echo "<tr><th>HRA<td>$hra";
            echo "<tr><th>TA<td>$ta";
            echo "<tr><th>PF<td>$pf";
            echo "<tr><th>Gross<td>$gross";
            echo "<tr><th>Net<td>$net";
            echo "</tbody></table>";
            echo "<div class='center'>Salary Information Stored...!<br><a href='staffsal.php'>Back</a></div>";
        }
        mysqli_free_result($result);        
    }    
}
include './footer.php';
?>