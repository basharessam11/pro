<?php

include "inc/header.php";

if (!isset($_SESSION['user'])) {
	header("location:log_user.php");
}

?>

<main>
<div id="breadcrumb">
<div class="container">
<ul>
<li><a href="#">Home</a></li>
<li><a href="#">Category</a></li>
<li>Page active</li>
</ul>
</div>
</div>
<!-- /breadcrumb -->

<div class="container margin_60_35">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="box_general_3 write_review">
<h1>Write a review for Dr. Julia Smooths</h1>
<div class="rating_submit">
<div class="form-group">
<form action="inc/fun/rateing.php?id=<?=$_GET['id']?>&&user=<?=$_SESSION['user']?>" method="post">
<label class="d-block"></label>
<span class="rating">
<input type="radio" class="rating-input" id="5_star" name="rateing" value="5"><label for="5_star" class="rating-star"></label>
<input type="radio" class="rating-input" id="4_star" name="rateing" value="4"><label for="4_star" class="rating-star"></label>
<input type="radio" class="rating-input" id="3_star" name="rateing" value="3"><label for="3_star" class="rating-star"></label>
<input type="radio" class="rating-input" id="2_star" name="rateing" value="2"><label for="2_star" class="rating-star"></label>
<input type="radio" class="rating-input" id="1_star" name="rateing" value="1"><label for="1_star" class="rating-star"></label>
</span>
</div>
</div>
<!-- /rating_submit -->

<div class="form-group">
<label>اكتب تعليقك</label>
<textarea name="comment" class="form-control" style="height: 180px;" placeholder="اكتب تعليقك هنا ..."></textarea>
</div>

<hr>
 <input class="btn_1" type="Submit" value="Submit review">
 </form>
</div>
</div>
</div>
<!-- /row -->
</div>
<!-- /container -->
</main>
<!-- /main -->
<?php
include 'inc/footer.php';

?>