<?php
include './header.php';
?>
<section  class="team">
<div class="container">
<div class="team-details">
<div class="project-header team-header text-left">
    <h2>Gallery</h2><br>
</div><!--/.project-header-->
<?php
$result = mysqli_query($link, "select fname from agallery");
?>
<table style="width:90%;margin:auto;">
    <?php
    $i=0;
    while($row = mysqli_fetch_row($result)) {
        if($i==0 || $i%2==0)
            echo "<tr>";
        echo "<td style='padding:30px;text-align:center;'><img src='$row[0]' style='width:500px;height:270px;' onclick=\"javascript:window.open('$row[0]');\">";
        $i++;
    }
    mysqli_free_result($result);
?>
</table>
</div><!--/.team- details-->
</div><!--/.container-->

</section><!--/.team-->
<!--team end-->
<?php
include './footer.php';
?>