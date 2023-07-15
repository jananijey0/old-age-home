<?php
include './adminheader.php';
echo "<div class='center' style='margin:20px auto;'><a href='agallery.php'>Add to Gallery</a> &nbsp&nbsp&nbsp <a href='avgallery.php'>View Gallery</a></div>";
if(!isset($_POST['submit'])) {
?>
<form name="f" action="agallery.php" method="post" enctype="multipart/form-data">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2"><h4>GALLERY</h4></th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>Select Image</th>
                <td><input type="file" name="ff" accept="image/*" required autofocus></td>
	    </tr>
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
    if(is_uploaded_file($_FILES['ff']['tmp_name'])) {
        $dt = date('Y-m-d',time());
        $fname = "ups/".time().$_FILES['ff']['name'];
        $b = move_uploaded_file($_FILES['ff']['tmp_name'], $fname);
        if($b) {
            mysqli_query($link, "insert into agallery(fname) values('$fname')");
            echo "<div class='center'>Uploaded to Gallery...!<br><a href='agallery.php'>Back</a></div>";
        } else
            echo "<div class='center'>Not Uploaded...!<br><a href='agallery.php'>Back</a></div>";
    } else {
        echo "<div class='center'>Image Not Uploaded...!<br><a href='agallery.php'>Back</a></div>";
    }
}
include './footer.php';
?>