<?php


include'inc/header.php';
if (isset($_SESSION["doctor"]) or isset($_SESSION["user"]) ) {
header("location:index.php");
}
?>

<main>
<div class="bg_color_2">
<div class="container margin_60_35">
<div id="login-2">
<h1>! تسجيل دخول المريض</h1>
<div>
<br>
</div>



<form class="u" method="post" action="<?=$_SERVER['PHP_SELF']?>">

<div class="box_form clearfix">

<br>
<br>
<center>
<div style="width:50%;">
<div class="form-group">
<input type="email" name="email_u" class="form-control" placeholder="Your email address">
</div>
<div class="form-group">
<input type="password" name="password_u" class="form-control" placeholder="Your password" name="password" id="password">
<?php
if ($login==0) {
echo'<br>
<div class="alert alert-danger">
  الرجاء ادخال ايميل وكلمة مرور صالحة
</div>';
}
?>
<a href="#0" class="forgot"><small>Forgot password?</small></a>
</div>
<div class="form-group">
<input class="btn_1" type="submit" value="Login">
</div>
</div>
<div class="form-group">
<p class="text-center link_bright">لا تملك حسابا حتى الآن? <a href="reg_user.php"><strong>سجل الان!</strong></a></p>
</div>
<br>
</center>

</div>
</form>



</div>
<!-- /login -->
</div>
</div>
</main>
<!-- /main -->

<?php

include'inc/footer.php';
?>