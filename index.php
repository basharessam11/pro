<?php
include 'inc/header.php';

?>

<main>
<div class="hero_home version_1">
<div class="content">
<h3 class="fadeInUp animated">اعثر على طبيب!</h3>
<p class="fadeInUp animated">
يمكنك العثور علي طبيبك بكل سهولة كل ما عليك هوا البحث بالاسم فقط
</p>
<form method="get" action="list.php" class="fadeInUp animated">
<div id="custom-search-input">
<div class="input-group">
<input type="text" class=" search-query" placeholder="اكتب اسم الدكتور" name="search">
<input type="submit" class="btn_search" value="Search">
</div>

</div>
</form>
</div>
</div>
<!-- /hero_map -->

<div class="bg_color_1">
<div class="container margin_120_95">
<div class="main_title">
<h2>الأطباء الأكثر تقييم</h2>
</div>
<div class="row">
<?php
$sql->select("doctor","ORDER BY rate DESC limit 3 ");
while ($row=$sql->res->fetch_assoc()) {
?>

<div class="col-lg-4 col-md-6">
<div class="box_list home">

<figure>

<a href="booking.php?id=<?=$row['id']?>"><img style=" width: 370px; height: 300px" src="admin/inc/photo/<?=$row['img']?>" class="img-fluid" alt=""></a>
<div class="preview"><span>Read more</span></div>
</figure>
<div class="wrapper">
<small><?php
$id=$row['spe'];
$sql->select1("spe","where id= $id");
while ($row1=$sql->res1->fetch_assoc()) {
echo$row1['name'];
}
?></small>

<h3 style="text-align:center"><a href="booking.php?id=<?=$row['id']?>"> دكتور :  <?=$row['name']?></a></h3>
<p><?=$row['des']?>....</p>
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

?> <small>(<?php
$id=$row['id'];
$sql->select1("review","where doctor_id= $id");

echo $sql->res1->num_rows;
?>)</small></span>

</div>
<ul>
<li><i class="icon-eye-7"></i> <?=$row['views']?> Views</li>
<li><a href="booking.php?id=<?=$row['id']?>">Book now</a></li>
</ul>
</div>
</div>
<?php
}
?>

</div>
<!-- /row -->
<p class="text-center add_top_30"><a href="list.php" class="btn_1 medium">عرض المزيد</a></p>

</div>
<!-- /container -->
</div>
<!-- /white_bg -->
<div class="container margin_120_95">
<div class="main_title">
<h2>احجز كشف حسب التخصص
</h2>
<p>يوجد الكثير من التخصصات هنا اختار اي تخصص تحتاجه</p>
</div>
<div class="row">
<?php

$sql->select('spe',"limit 8");
while ($row=$sql->res->fetch_assoc()) {
?>

<div class="col-lg-3 col-md-6">
<a href="list.php?id=<?=$row['id']?>" class="box_cat_home">
<i class="icon-info-4"></i>
<img src="img/icon/<?=$row['icon']?>" width="60" height="60" alt="">
<h3><?=$row['name']?></h3>
<ul class="clearfix">
<li style="margin: 0 73px 0 0;"><strong><?php
     $id=$row['id'];
 $sql->select1('doctor',"where spe = $id and ok=1");
echo $sql->res1->num_rows;
?></strong>Doctors</li>
</ul>
</a>
</div>


<?php
}

?>


</div>
<p class="text-center add_top_30"><a href="spe.php" class="btn_1 medium">عرض المزيد</a></p>
<!-- /row -->
</div>
<!-- /container -->

<div class="cta_subscribe">
<div class="container-fluid h-100">
<div class="row h-100 justify-content-center align-items-center">
<div class="col-md-6 p-0">
<div class="block_1">
<figure><img src="img/doctors_icon.svg" alt=""></figure>
<h3>هل انت دكتور ؟</h3>
<p>تتيح لك الخدمة الحصول على أقصى قدر من الظهور عبر الإنترنت وإدارة المواعيد وجهات الاتصال القادمة من الموقع بطريقة بسيطة وسريعة</p>
<a href="register.php" class="btn_1">انضم الان</a>
</div>
</div>
<div class="col-md-6 p-0">
<div class="block_2">
<figure><img src="img/patient_icon.svg" alt=""></figure>
<h3>هل انت مريض ؟</h3>
<p>اختيار متخصص لم يكن بهذه السرعة من قبل! يمكنك تصفية نتائج البحث حسب الموقع والتخصص الطبي ، وحجز الفحص الطبي عبر الإنترنت.</p>
<a href="reg_user.php" class="btn_1">انضم الان</a>
</div>

</div>
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /cta_subscribe -->
</main>
<!-- /main content -->

<?php
include 'inc/footer.php';

?>