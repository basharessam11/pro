<?php
include 'inc/header.php';
error_reporting(0);
$page=$_GET['page']-1;
$id=0;
for ($i=1; $i <=$page ; $i++) { 
 $id=$id+6;
}


?>
<input style="display: none;" class="id" value="<?=$id;?>" type="text">

   <main class="ajax">
   <div id="results">
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                   <h4><strong>Showing <?=$id+6?></strong> of <?php
                   $sql->selectall('Doctor');
                   

   echo$sql->res->num_rows; ?> results</h4>
               </div>
               <div class="col-md-6">
                    <div class="search_bar_list">
                    <input type="text" class="search form-control" placeholder="اكتب اسم الدكتور">
                    <input type="submit" value="Search">
                </div>
               </div>
           </div>
           <!-- /row -->
       </div>
       <!-- /container -->
   </div>
   <!-- /results -->
   
   <div class="filters_listing">
<div class="container ">
<ul class="clearfix">
<li>
<h6>Type</h6>
<div class="switch-field">

<input type="radio" id="doctors" name="type_patient" value="doctors" checked>
<label for="doctors">Doctors</label>

</div>
</li>

<li>
<h6>Sort by</h6>
<select  class="order  form-select">
<option  value="4">كل الدكاترة</option>
<option  value="3">الاعلي تقييم</option>
<option  value="1">رجال</option>
<option  value="2">نساء</option>
</select>
</li>
</ul>
</div>
<!-- /container -->
</div>
<!-- /filters -->
   
<div class="container margin_60_35">
<div class="row">
<div class="col-lg-12">
<div class="row  ajax1">

<?php

if (isset($_GET['search'])) {
if (!empty($_GET['search'])) {
$name=$_GET['search'];
$sql->select("doctor","where name like '%$name%' and ok = 1 ");
}
}else{

if (!isset($_GET['id'])) {

$sql->select('Doctor',"where ok = 1 limit 6 offset  $id");
}else
{
$id=$_GET['id'];
$sql->select('Doctor',"where ok=1 and spe=$id");
}
}



while ($row=$sql->res->fetch_assoc()) {
?>


<div class="col-md-4">
<div class="box_list wow fadeIn">

<figure>
<a href="booking.php?id=<?=$row['id']?>"><img style=" width: 370px; height: 300px" src="admin/inc/photo/<?=$row['img']?>" class="img-fluid" alt="">
<div class="preview"><span>Read more</span></div>
</a>
</figure>
<div class="wrapper">
<small><?php 
$spe=$row['spe'];
$sql->select1('spe',"where id=$spe");

while ($row1=$sql->res1->fetch_assoc()) {
 echo$row1['name'];
}
?></small>
<a href="booking.php?id=<?=$row['id']?>">
<h3> دكتور <?=$row['name']?></h3>
</a>
<p><?=$row['des']?></p>
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
$sql->select1('review',"where doctor_id= $id");

echo$sql->res1->num_rows;
?>)</small></span>

</div>
<ul>
<li><a href="<?=$row['map']?>" "><i class="icon_pin_alt"></i>View on map</a></li>
<li><a href="<?=$row['map']?>" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
<li><a href="booking.php?id=<?=$row['id']?>">Book now</a></li>
</ul>
</div>
</div>
<!-- /box_list -->

<script>

$('.order').on('change',function() {
var a=$(this).val();
var id=$('.id').val()

$.ajax({
url: 'inc/fun/order.php',
cache: false,
type: 'post',
data: {key:a,page:id},
success: function(res){
console.log(res)
$('.ajax').html(res)

}
})

})

$('.search').on('keyup',function() {
var a=$(this).val();
var id=$('.id').val();
var get=$('.idget').val();

$.ajax({
url: 'inc/fun/search.php',
cache: false,
type: 'post',
data: {key:a,page:id,id:get},
success: function(res){
console.log(res)
$('.ajax1').html(res)

}
})

})





</script>
<?php





}

?>





</div>
<!-- /row -->

<nav aria-label="" class="add_top_20">
<ul class="pagination pagination-sm">

<?php
if (isset($_GET['id'])) {
$xs=$_GET['id'];
$sql->select('doctor',"where spe=$xs");
}else{$sql->check('Doctor',["ok"=>1]);
      $n= $sql->check/6+1;}

   if (!isset($_GET['page'])) {
  $page=$_GET['page']=1;
   }else{$page=$_GET['page'];}
   
   $pp=$page-1;
   if($page!=1){
    echo '<li class="page-item"><a class="page-link" href="?page='.$pp.'" tabindex="">Previous</a></li>';
    }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Previous</a>
                         </li>' ;
              }
    for ($i=1; $i <$n ; $i++) { 
    if ($page==$i) {
    	$ac="active";
    }else{
    	$ac="";
    }
    if ($n!=0) {

    echo'<li class="page-item '.$ac.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
    }

    }
    $page=$_GET['page']+1;
    $hi=$n-1;

    if ($hi>1) {
     if ($page!=$i) {
    echo '<a class="page-link" href="?page='.$page.'">Next</a>';
    }else{
                echo '<li class="page-item disabled">
                         <a class="page-link"  >Next</a>
                         </li>' ;
              }
    }

?>



</ul>
</nav>
<!-- /pagination -->
</div>
<!-- /col -->


<!-- /aside -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</main>

<input class="idget" type="hidden" value="<?=$_GET['id']?>">


<?php
include 'inc/footer.php';
?>
