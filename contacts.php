	<?php

include'inc/header.php';
	?>
	
	<main>
	
		
		<div class="container margin_60_35">
			<div class="row">
				
				<!--/aside -->

				<div class=" col-lg-12 col-md-12 ml-auto">
					<center>
					<div class="box_general">

						<h3>Contact us</h3>
						<p>
							Mussum ipsum cacilds, vidis litro abertis.
						</p>
						<div>
							<div id="message-contact"></div>
							<form method="post" action="inc/fun/contact.php" id="contactform">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="name_contact" name="name" placeholder="الاسم الاول">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="lastname_contact" name="lastname" placeholder="الاسم الاخير">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="email" id="email_contact" name="email" class="form-control" placeholder="البريد الالكتروني">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" id="phone_contact" name="phone" class="form-control" placeholder="التليفون">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea rows="5" id="message_contact" name="message" class="form-control" style="height:100px;" placeholder="اكتب هنا "></textarea>
										</div>
									</div>
								</div>
								<?php
								if (isset($_GET['ok'])==1) {
								echo '<div class="form-control alert alert-success">تم الارسال بنجاح</div>';
								
								}
								?>
								<input type="submit" value="Submit" class="btn_1 add_top_20" id="submit-contact">
							</form>
						</div>
						<!-- /col -->
					</div>
				</div>
			</center>
				<!-- /col -->
			</div>
			<!-- End row -->
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
	
		<?php

include'inc/footer.php';
	?>