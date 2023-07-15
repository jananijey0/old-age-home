<?php
mysqli_close($link);
?>
</div>
</section>
<footer class="footer-copyright">
<div class="container">
<div class="row">
<div class="col-sm-7">
<div class="foot-copyright pull-left">
<p>
&copy; All Rights Reserved. Designed and Developed by
<a href="https://www.themesine.com">ThemeSINE</a>
</p>
</div><!--/.foot-copyright-->
</div><!--/.col-->
<div class="col-sm-5">
<div class="foot-menu pull-right">	  
<ul>
<li ><a href="#">legal</a></li>
<li ><a href="#">sitemap</a></li>
<li ><a href="#">privacy policy</a></li>
</ul>
</div><!-- /.foot-menu-->
</div><!--/.col-->
</div><!--/.row-->
<div id="scroll-Top">
<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
</div><!--/.scroll-Top-->
</div><!-- /.container-->

</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->



		<!-- jaquery link -->

<script src="assets/js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!--modernizr.min.js-->
<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script-->


<!--bootstrap.min.js-->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<!-- bootsnav js -->
<script src="assets/js/bootsnav.js"></script>

<!-- for manu -->
<script src="assets/js/jquery.hc-sticky.min.js" type="text/javascript"></script>


<!-- vedio player js -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>


<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script-->

<!--owl.carousel.js-->
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>

<!-- counter js -->
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>

<!--Custom JS-->
<script type="text/javascript" src="assets/js/jak-menusearch.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
    </body>
<script>
    function check_email(e) {
	var ep = /^\w+\.{0,1}\w+\@[a-z]+\.([a-z]{3}|[a-z]{2}\.[a-z]{2}){1}$/
	return e.match(ep)
    }
    function check_mobile(m) {
	var mp = /^[987]\d{9}$/
	return m.match(mp)
    }
    function validate_newperson() {
            var age = f.age.value
            var mob = f.mobile.value
            var ap = /^[^0]\d{1,2}$/
            
            if(!age.match(ap)) {
                alert("Invalid Age")
                f.age.focus()
                return false
            }
            
            if(!check_mobile(mob)) {
                alert("Invalid Mobile")
                f.mobile.focus()
                return false
            }
            return true
    }
    function validate_donor() {
        var mb = f.mobile.value
        var em = f.email.value
        var pwd = f.pwd.value
        var cpwd = f.cpwd.value
        if(!check_mobile(mb)) {
            alert("Invalid Mobile Number")
            f.mobile.focus()
            return false
        }
        if(!check_email(em)) {
            alert("Invalid Email")
            f.email.focus()
            return false
        }
        if(pwd!=cpwd) {
            alert("Confirm Password not Match")
            f.cpwd.focus()
            return false
        }
        return true
    }
    function validate_staff() {
        var ex = f.exp.value
        var mb = f.mobile.value
        var em = f.email.value
        var pwd = f.pwd.value
        var cpwd = f.cpwd.value
        var exp = /^\d+$/
        if(!ex.match(exp)) {
            alert("Invalid Experience Years")
            f.exp.focus()
            return false
        }
        if(!check_mobile(mb)) {
            alert("Invalid Mobile Number")
            f.mobile.focus()
            return false
        }
        if(!check_email(em)) {
            alert("Invalid Email")
            f.email.focus()
            return false
        }
        if(pwd!=cpwd) {
            alert("Confirm Password not Match")
            f.cpwd.focus()
            return false
        }
        return true
    }
    function validate_sal() {
        var absent = f.absent.value
        var basic = f.basic.value
        var pp = /^\d+$/
        if(!absent.match(pp)) {
            alert("Invalid Absent Days")
            f.absent.focus()
            return false
        }
        if(!basic.match(pp)) {
            alert("Invalid Basic Value")
            f.basic.focus()
            return false
        }
        return true
    }
    function validate_donation() {
        var amt = f.amount.value
        var bank = f.bank.value
        var chqno = f.chqno.value
        var ap = /^\d+$/
        var cp = /^\d{6}$/
        if(!amt.match(ap)) {
            alert("Invalid Amount")
            f.amount.focus()
            return false
        }
        if(f.pmode[1].checked) {
            if(bank=="") {
                alert("Enter Bank Name")
                f.bank.focus()
                return false
            }
            if(!chqno.match(cp)) {
                alert("Invalid Cheque Number")
                f.chqno.focus()
                return false
            }
        }
        return true
    }
    function call1(p1) {
        if(p1!="") {
        ob = getObject()
        ob.onreadystatechange = doWork1
        ob.open("GET","getdonor.php?id="+p1,false)
        ob.send()
        } else {
            document.getElementById("name").value = ""
            document.getElementById("addr").value = ""
            document.getElementById("city").value = ""
            document.getElementById("mobile").value = ""
        }
    }
    function doWork1() {
        if(ob.readyState==4 && ob.status==200) {
            var s1 = ob.responseText
            var s2 = s1.split("~")
            document.getElementById("name").value = s2[0]
            document.getElementById("addr").value = s2[1]
            document.getElementById("city").value = s2[2]
            document.getElementById("mobile").value = s2[3]
        }
    }
    function getObject() {
        if(window.ActiveXObject)
            return new ActiveXObject("Microsoft.XMHLTTP")
        else
            return new XMLHttpRequest()
    }
    function call2(p2) {
        if(p2!="") {
            ob1 = getObject()
            ob1.onreadystatechange = doWork2
            ob1.open("GET","getperson.php?id="+p2,false)
            ob1.send()
        } else {
            document.getElementById("pname").value = ""
        }
    }
    function doWork2() {
        if(ob1.readyState==4 && ob1.status==200) {
            document.getElementById("pname").value = ob1.responseText
        }
    }
    function call3(p3) {
        if(p3!="") {
            ob2 = getObject()
            ob2.onreadystatechange = doWork3
            ob2.open("GET","getexp.php?exp="+p3,false)            
            ob2.send()
        } else {
            document.getElementById("expenses_report").innerHTML = ""
        }
    }
    function doWork3() {
        if(ob2.readyState==4 && ob2.status==200) {            
            document.getElementById("expenses_report").innerHTML = ob2.responseText
        }
    }
</script>
</html>