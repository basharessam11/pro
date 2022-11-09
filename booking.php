
<?php
include "inc/header.php";


$id=$_GET['id'];
$sql->selectavg('rate',"review","doctor_id=$id");

while ($row6=$sql->res_avg->fetch_assoc()) {
$rate=$row6['AVG(rate)']-0;
 
}
$sql->update('doctor',$id,["rate"=>"$rate"]);

$id=$_GET['id'];
$sql->select('doctor',"where id=$id");

while ($row=$sql->res->fetch_assoc()) {


?>
<main>
<div id="breadcrumb">
<div class="container">
<ul>
<li><a href="#">Home</a></li>
<li><a href="#">Category</a></li>
<li>booking</li>
</ul>
</div>
</div>
<!-- /breadcrumb -->

<div class="container margin_60">
<div class="row">
<div class="col-xl-8 col-lg-8">
<nav id="secondary_nav">
<div class="container">
<ul class="clearfix">
<li><a href="#section_1" class="active">ﻣﻌﻠﻮﻣﺎﺕ ﻋﺎﻣﺔ</a></li>
<li><a href="#section_2">اﻟﺘﻘﻴﻴﻤﺎﺕ</a></li>
<li><a href="#sidebar">Booking</a></li>
</ul>
</div>
</nav>
<div id="section_1">
<div class="box_general_3">
<div class="profile">
<div class="row">
<div class="col-lg-5 col-md-4">
<figure>
<img src="admin/inc/photo/<?=$row['img']?>" style=" width: 370px; height: 300px" alt="" class="img-fluid">
</figure>
</div>
<div class="col-lg-7 col-md-8">
<small><?php
$id=$row['spe'];
$sql->select1("spe","where id= $id");
while ($row1=$sql->res1->fetch_assoc()) {
echo$row1['name'];
}
?></small>
<h1> ﺩﻛﺘﻮﺭ :  <?=$row['name']?></h1>
<span class="rating">
<?php
if ($row['rate']>=1) {
 echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($row['rate']>=2) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($row['rate']>=3) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($row['rate']>=4) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($row['rate']>=5) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}

?>
<small>(<?php
$id=$row['id'];
$sql->select1("review","where doctor_id= $id");

echo $sql->res1->num_rows;
?>)</small>

</span>
<ul class="statistic">
<li><?=$row['views']?> Views</li>

</ul>
<ul class="contacts">
<li>
<h6><?=$row['address']?></h6>
<?php
$city=$row['city']; 
$state=$row['state'];        
$sql->select1("city","where id= $city");
while ($row3=$sql->res1->fetch_assoc()) {
echo $row3['name'];
}
echo' , ';
$sql->select1("state","where id= $state");
while ($row3=$sql->res1->fetch_assoc()) {
echo $row3['name'];
}

?>
<a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"> <strong>View on map</strong></a>
</li>
<li>
<h6>Phone</h6> <a href="tel://<?=$row['phone']?>">+<?=$row['phone']?></a></li>
</ul>
</div>
</div>
</div>

<hr>

<!-- /profile -->
<div class="indent_title_in">
<i class="pe-7s-user"></i>
<h3>ﺑﻴﺎﻥ ﻣﻬﻨﻲ</h3>

</div>
<div class="wrapper_indent">
<p><?=$row['state_ment']?></p>
<h6>اﻟﺘﺨﺼﺎﺻﺎﺕ</h6>
<div class="row">
<div class="col-lg-6">
<ul class="bullets">
<?php
$spe=$row['spe'];
$sql->select1("spe","where id= $spe");
while ($row5=$sql->res1->fetch_assoc()) {
echo '<li>'.$row5['name'].'</li>';
}?>

</ul>
</div>

</div>
<!-- /row-->
</div>
<!-- /wrapper indent -->

<hr>

<div class="wrapper_indent">

<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Service - Visit</th>
<th>Price</th>
</tr>
</thead>
<tbody>

<tr>
<td>اﺳﺘﺸﺎﺭﺓ ﻋﺎﻣﺔ</td>
<td>$<?=$row['price']?></td>
</tr>

</tbody>
</table>
</div>
</div>
<!--  /wrapper_indent -->
</div>
<!-- /section_1 -->
</div>
<!-- /box_general -->

<div id="section_2">
<div class="box_general_3">
<div class="reviews-container">
<div class="row">
<div class="col-lg-3">
<div id="review_summary">
<strong><?php
$id=$_GET['id'];
$sql->select1('doctor',"where id=$id");
    
while ($row6=$sql->res1->fetch_assoc()) {
$rate=$row6['rate']-.0;
echo $rate ;
}

?></strong>

<div class="rating">
<?php
if ($rate>=1) {
 echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($rate>=2) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($rate>=3) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($rate>=4) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($rate>=5) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}

?>
</div>
<small>Based on <?php
$id=$row['id'];
$sql->select1('review',"where doctor_id= $id");
echo $sql->res1->num_rows;
?> reviews</small>
</div>
</div>
<div class="col-lg-9">
<div class="row">
<div class="col-lg-10 col-9">
<div class="progress">
<?php

$id=$_GET['id'];
$sql->selectavg("rate=5","review","doctor_id=$id");
while ($row6=$sql->res_avg->fetch_assoc()) {
$rate=$row6['AVG(rate=5)']*100;

 echo '<div class="progress-bar" role="progressbar" style="width: '.$rate.'%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">'.$rate.'%</div>';
}

?>

</div>
</div>
<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
</div>
<!-- /row -->
<div class="row">
<div class="col-lg-10 col-9">
<div class="progress">
<?php

$id=$_GET['id'];
$sql->selectavg("rate=4","review","doctor_id=$id");
while ($row6=$sql->res_avg->fetch_assoc()) {
$rate=$row6['AVG(rate=4)']*100;

 echo '<div class="progress-bar" role="progressbar" style="width: '.$rate.'%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">'.$rate.'%</div>';
}

?>
</div>
</div>
<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
</div>
<!-- /row -->
<div class="row">
<div class="col-lg-10 col-9">
<div class="progress">
<?php

$id=$_GET['id'];
$sql->selectavg("rate=3","review","doctor_id=$id");
while ($row6=$sql->res_avg->fetch_assoc()) {
$rate=$row6['AVG(rate=3)']*100;

 echo '<div class="progress-bar" role="progressbar" style="width: '.$rate.'%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">'.$rate.'%</div>';
}

?></div>
</div>
<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
</div>
<!-- /row -->
<div class="row">
<div class="col-lg-10 col-9">
<div class="progress">
<?php

$id=$_GET['id'];
$sql->selectavg("rate=2","review","doctor_id=$id");
while ($row6=$sql->res_avg->fetch_assoc()) {
$rate=$row6['AVG(rate=2)']*100;

 echo '<div class="progress-bar" role="progressbar" style="width: '.$rate.'%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">'.$rate.'%</div>';
}

?>
</div>
</div>
<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
</div>
<!-- /row -->
<div class="row">
<div class="col-lg-10 col-9">
<div class="progress">
<?php

$id=$_GET['id'];
$sql->selectavg("rate=1","review","doctor_id=$id");
while ($row6=$sql->res_avg->fetch_assoc()) {
$rate=$row6['AVG(rate=1)']*100;

 echo '<div class="progress-bar" role="progressbar" style="width: '.$rate.'%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">'.$rate.'%</div>';
}

?>

</div>
</div>
<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
</div>
<!-- /row -->
</div>
</div>
<!-- /row -->

<hr>
<?php
  $sql->select1("review","where doctor_id=$id");

while ($row7=$sql->res1->fetch_assoc()) {
?>
<div class="review-box clearfix">

<figure class="rev-thumb"><img src="admin/inc/photo/<?php
$userid=$row7['user_id'];
 $sql->select("user","where id= $userid");
while ($row8=$sql->res->fetch_assoc()) {
echo$row8['img'];
?>" alt="">
</figure>
<div class="rev-content">
<div class="rating">
<?php
if ($row7['rate']>=1) {
 echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($row7['rate']>=2) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($row7['rate']>=3) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($row7['rate']>=4) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}
if ($row7['rate']>=5) {
echo '<i class="icon_star voted"></i>';
}else{echo '<i class="icon_star"></i>';}

?>
</div>
<div class="rev-info">
<?=$row8['name']?> – <?=$row7['date']?>:
</div>
<div class="rev-text">
<p>
<?=$row7['review']?>
</p>
</div>
</div>

</div>

<?php
}
}
?>


<!-- End review-box -->


<!-- End review-box -->
</div>
<!-- End review-container -->
<hr>
<?php
if (isset($_GET['rate'])=='yes') {
echo '<br><div class=" alert alert-success">ﺗﻢ اﻟﺘﻌﻠﻴﻖ ﺑﻨﺠﺎﺡ</div>';
}?>
<div class="text-right"><a href="submit-review.php?id=<?=$_GET['id']?>" class="btn_1">Submit review</a></div>
</div>
</div>
<!-- /section_2 -->
</div>
<!-- /col -->
<aside class="col-xl-4 col-lg-4" id="sidebar">
<div class="box_general_3 booking">
<div class="title">
<pre><h3>     اﺣﺠﺰ ﻛﺸﻒ</h3></pre>
<!-- <small>Monday to Friday 09.00am-06.00pm</small>
 --></div>
<div id="message-booking"></div>
<?php

?>
<form method="post" action="inc/fun/book_in.php?id=<?=$_GET['id']?>&user=<?=$_SESSION['user'] ?? ''?>" id="booking">

<!-- /row -->
<div class="row">
<div class="col-6">
<div class="form-group">
<label>: ﺗﺎﺭﻳﺦ اﻟﻜﺸﻒ</label><br>

<input class="form-control" type="text" id="booking_date" name="date" data-lang="ar" data-min-year="20<?=$date=date('y')?>" data-max-year="20<?=$date+1?>" data-disabled-days="">
<?php

if (isset($_GET['day'])=='no' or isset($_GET['mon'])=='no') {
echo '<br><div class=" alert alert-danger">اﻟﺮﺟﺎء اﺧﺘﻴﺎﺭ اﻟﻴﻮﻡ ﻭاﻟﺸﻬﺮ اﻟﺼﺤﻴﺢ</div>';
}
?>

</div>
</div>
<div class="col-6">
<div class="form-group">
<label>: ﻭﻗﺖ اﻟﻜﺸﻒ</label>
<br>
<input class="form-control"  type="text" id="booking_time" name="time">
<?php

if (isset($_GET['time'])=='no') {
echo '<br><div class=" alert alert-danger">اﻟﺮﺟﺎء اﺧﺘﻴﺎﺭ اﻟﻮﻗﺖ اﻟﺼﺤﻴﺢ</div>';
}
?>
</div>
</div>
</div>

<!-- /row -->
<div class="row">
<div class="col-lg-12">
<div  class="form-group">
	<label>: التخصص</label>
<br>
<select  class="form-control" name="spe" id="booking_visit">

<?php
$spe=$row['spe'];
$sql->select1("spe","where id=$spe");
while ($row9=$sql->res1->fetch_assoc()) {


echo '<option selected=""  value="'.$row9['id'].'">'.$row9['name'].'</option>';
}
?>


</select>
<?php

if (isset($_GET['spy'])=='no') {
echo '<br><div class=" alert alert-danger">اﻟﺮﺟﺎء اﺧﺘﻴﺎﺭ اﻟﺘﺨﺼﺺ</div>';
}
?>
</div>
</div>
</div>
<!-- /row -->
<div class="row">
<div class="col-lg-12">
<div class="form-group">
	<label>: الاعراض</label>
<br>
<textarea rows="5" id="booking_message" name="message" class="form-control" style="height:80px;" placeholder="اﻛﺘﺐ اﻻﻋﺮاﺽ"></textarea>

</div>
</div>
</div>
<!-- /row -->

<!-- /row -->
<hr>
<?php

if (isset($_GET['bok'])=='no') {
echo '<br><div class=" alert alert-danger">ﻳﻮﺟﺪ ﺣﺠﺰ ﻓﻲ ﻫﺬا اﻟﻤﻌﺎﺩ اﻟﺮﺟﺎء اﺧﺘﻴﺎﺭ ﻣﻌﺎﺩ اﺧﺮ</div>';
}
if (isset($_GET['su'])=='yes') {
echo '<br><div class=" alert alert-success">ﺗﻢ اﻟﺤﺠﺰ ﺑﻨﺠﺎﺡ</div>';
}
?>
<div style="position:relative;"><input type="submit" class="btn_1 full-width" value="Book Now" id="submit-booking"></div>
</form>
</div>
<!-- /box_general -->
</aside>
<!-- /asdide -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</main>
<!-- /main -->
<?php
$view=$row['views']+1;
}
$sql->update('doctor',$id,['views'=>"$view"]);


include 'inc/footer.php';
?>