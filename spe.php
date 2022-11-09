<?php
include "inc/header.php";
?>

<div class="container margin_120_95">
			<div class="main_title">
				<h2>البحث عن طريق التخصص</h2>
				<p>يوجد الكثير من التخصصات هنا اختار اي تخصص تحتاجه</p>
			</div>
			<div class="row">
				<?php

				$sql->selectall('spe');
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
			<!-- /row -->
		</div>

<?php

include "inc/footer.php";
?>