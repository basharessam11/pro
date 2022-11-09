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

        
      <div class="aa col-md-7" >   
        <form class="uu" >
<div class="box_form">
	<h1>تسجيل المريض</h1>
<br>
<br>
<div class="form-group">
<label> :  اﻻﺳﻢ ﺑﺎﻟﻜﺎﻣﻞ</label>
<input type="text" class="form-control" name="name" placeholder="اﻻﺳﻢ ﺑﺎﻟﻜﺎﻣﻞ">
</div>
<div class="form-group">
<label>:  اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ</label>
<input type="email" class="form-control e" name="email" placeholder="اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ">

<br>
<div class="e alert alert-danger" style="display: none;">

  ﻫﺬا اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ ﻣﻮﺟﻮﺩ ﺑﺎﻟﻔﻌﻞ
</div>
</div>

<div class="form-group">
<label> :  اﻟﺘﻠﻴﻔﻮﻥ</label>
<input type="text" class="form-control" name="phone" placeholder="اﻟﺘﻠﻴﻔﻮﻥ">
</div>
<div class="form-group">
<label> : ﺗﺎﺭﻳﺦ اﻟﻤﻴﻼﺩ</label>
<input required="" type="date"  class="form-control" placeholder="اﻟﺘﻠﻴﻔﻮﻥ" name="date">
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
<label>:  ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ</label>
<input type="password" class="form-control" id="password" name="password" placeholder="ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ">
</div>
<div class="form-group">
<label>:  اﻋﺪ ﻛﺘﺎﺑﺔ ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ</label>
<input type="password" class=" form-control" id="password1" name="password1" placeholder="اﻋﺪ ﻛﺘﺎﺑﺔ ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ">
</div>
<br>
<div class="p alert alert-danger" style="display: none;">
  ﻛﻠﻤﺔ اﻟﻤﺮﻭﺭ ﻏﻴﺮ ﻣﺘﻄﺎﺑﻘﺔ
</div>








<div class="form-group text-center add_top_30">
<input class="btn_1 form-control" type="submit" value="ﺗﺴﺠﻴﻞ">
</div>
<div class="form-group">

<p class="text-center link_bright">ﻫﻞ ﻟﺪﻳﻚ ﺣﺴﺎﺏ ﺑﺎﻟﻔﻌﻞ? <a href="login.php"><strong>ﺗﺴﺠﻴﻞ اﻟﺪﺧﻮﻝ!</strong></a></p>

       </div>
</div>

</form>

        



</div>
       </center>

<!-- /row -->
</div>
<!-- /register -->

</div>

</main>
<!-- /main -->


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- /main -->
<script>






$(".uu").on('submit',function(b){
b.preventDefault()
$.ajax({
url:'inc/fun/reg_user.php',
method:'post',
data : new FormData(this),
success:function(data){
console.log(data)
 var d = jQuery.parseJSON(data);
 for(i = 0 ; i<=d.length; i++ ){

 var a = d[i];
 console.log(a)

 if (a=='email=no') {
 
 $('.e').show();
 }
 
 
 
 if (a=='pass=no') {
 
 $('.p').show();
 }
 if (a=='login=yes') {
 location.href ="log_user.php";
 }
 
 }
 
 

},
processData  : false ,
contentType : false 

})
})

</script>
<?php
include 'inc/footer.php';

?>