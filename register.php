<?php

include"inc/header.php";

?>

<main>
<div class="bg_color_2">
<div class="container margin_60_35">



<br>
<br>
<br>
<br>
<center>

         <div  class="bb col-md-7"  >
        <form class="dd">


<div class="box_form" >
<h1>تسجيل دكتور</h1>
<br>
<br>
<div class="form-group">
<label> : اﻻﺳﻢ</label>
<input required="" type="text" class="form-control" name="name" placeholder="اﻻﺳﻢ ﺑﺎﻟﻜﺎﻣﻞ ﺑﺎﻟﻌﺮﺑﻲ" >
</div>
<!-- phone -->
 
<div class="form-group">
<label> : اﻟﺘﻠﻴﻔﻮﻥ</label>
<input required="" type="text" class="form-control" placeholder="اﻟﺘﻠﻴﻔﻮﻥ" name="phone">
</div>

 

<!-- /row -->
<!-- email
 --> 
<div class="form-group">
<label> : اﻻﻳﻤﻴﻞ</label>
<input required="" type="email" class="form-control" placeholder="اﻻﻳﻤﻴﻞ" name="email">

</div>
<br>
<div class="ee alert alert-danger" style="display: none;">
  ﻫﺬا اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ ﻣﻮﺟﻮﺩ ﺑﺎﻟﻔﻌﻞ
</div>
 



<div class="form-group">
<label> : ﺗﺎﺭﻳﺦ اﻟﻤﻴﻼﺩ</label>
<input required="" type="date" class="form-control" placeholder="اﻟﺘﻠﻴﻔﻮﻥ" name="date">
</div>

<div class="form-group">
<label> : اﻟﺠﻨﺲ</label>
<select required="" name="sex" class="form-control ">
<option selected="" value="">اﻟﺠﻨﺲ</option>
<option  value="1">ذكر</option>
<option  value="2">انثي</option>

</select>
</div>

<div class="form-group">
<label> : اﻟﺘﺨﺼﺺ</label>
<select required="" name="spe" class="form-control ">
<option selected="" value="">اﻟﺘﺨﺼﺺ</option>
<?php

$sql->selectall('spe');

while ($row=$sql->res->fetch_assoc()) {
 echo '<option  value="'.$row['id'].'">'.$row['name'].'</option>';
}

?>

</select>
</div>

<div class="form-group">
<label> : اﻟﻤﺤﺎﻓﻈﺔ</label>
<select required="" name="state" class="form-control state">
<option selected="" value="">اﻟﻤﺤﺎﻓﻈﺔ</option>
<?php

$sql->selectall('state');

while ($row=$sql->res->fetch_assoc()) {
 echo '<option  value="'.$row['id'].'">'.$row['name'].'</option>';
}

?>

</select>
</div>
<div class="form-group ">
<label> : اﻟﻤﺪﻳﻨﺔ</label>
<select required="" name="city" class="form-control pro">
<option selected="" value="">اﻟﻤﺪﻳﻨﺔ</option>

</select>
</div>


<!-- /row -->



<!-- /row -->


 
<div class="form-group">
<label> : ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ</label>
<input type="password" class="form-control" id="password1" name="password1" placeholder="ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ">
</div>

 
<div class="form-group">
<label> : اﻋﺪ ﻛﺘﺎﺑﺔ ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ</label>
<input type="password" class="form-control" id="password2" name="password2" placeholder="اﻋﺪ ﻛﺘﺎﺑﺔ ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ">

<br>
<div class="pp alert alert-danger" style="display: none;">
  ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻏﻴﺮ ﻣﺘﻄﺎﺑﻘﺔ
</div>
<!-- /row -->
<p class="text-center add_top_30"><input type="submit" class=" btn_1 form-control" value="ﺗﺴﺠﻴﻞ"></p>
<div class="form-group">

<p class="text-center link_bright">ﻫﻞ ﻟﺪﻳﻚ ﺣﺴﺎﺏ ﺑﺎﻟﻔﻌﻞ? <a href="login.php"><strong>ﺗﺴﺠﻴﻞ اﻟﺪﺧﻮﻝ!</strong></a></p>

       </div>
</div>
</form>


       </center>
</div>
<!-- /row -->
</div>
<!-- /register -->



</main>
<!-- /main -->


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- /main -->
<script>
$('.state').change(function(){
var a=$('.state').val()


$.ajax({
url:'inc/fun/spe.php',
method:'POST',
data:{
id:a
},
success:function(data){
$(".pro").html(data)

}

})
})



$(".dd").on('submit',function(b){
b.preventDefault()
$.ajax({
url:'inc/fun/reg.php',
method:'post',
data : new FormData(this),
success:function(data){

 var d = jQuery.parseJSON(data);
 for(i = 0 ; i<=d.length; i++ ){

 var a = d[i];
 console.log(data)

 if (a=='email=no') {
 
 $('.ee').show();
 }
 
 
 
 if (a=='pass=no') {
 
 $('.pp').show();
 }
 if (a=='login=yes') {
 location.href ="login.php";
  console.log(data);
 }
 
 }


// console.log(res)


},
processData  : false ,
contentType : false 

})
})



</script>
<?php
include 'inc/footer.php';

?>