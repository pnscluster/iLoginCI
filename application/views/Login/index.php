
<div class="container" style="margin-top: 15px;">
	
	<?php echo form_open("Login/login", array('id' => 'frm_login'));?>
		<div class="row center">
			<div class="col-md-4">
				<h2 class="form-signin-heading">Please sign in</h2>
				<!-- <div class="form-group"> -->
				<?php 
					echo form_label("Email address", "Email", array('class' => 'sr-only'));
					echo form_input(array(	'name' 				=> 'Email',
											'id' 				=> 'Email',
	                    					'class' 			=> 'form-control',
											'placeholder'		=> 'Email address',
											'type'				=> 'email',
											'aria-describedby'	=> 'emailHelp',
											'required'			=> ''
					));
					echo form_label("Password", "Password", array('class' => 'sr-only'));
					echo form_input(array(	'name' 			=> 'Password',
											'id' 			=> 'Password',
											'class' 		=> 'form-control',
											'type'			=> 'password',
											'placeholder'	=> 'Password',
											'required'		=> ''
					));
				?>
				<div class="checkbox">
					<label>
						<?php 
							echo form_input(array(	'name' 			=> 'remember',
													'id' 			=> 'remember',
													'type'			=> 'checkbox',
													'value'			=> 'remember-me'
							));
						?>
						Remember me
					</label>
				</div>
				<?php 
					echo form_button( array(
					        'name'          => 'btn_submit',
					        'id'            => 'btn_submit',
					        'class'         => 'btn btn-lg btn-primary btn-block',
					        'type'          => 'submit',
					        'content'       => 'Sign in'
					));
				?>
			</div>
		</div>
	<?php echo form_close();?>

      
</div> <!-- /container -->

<script>
$(function(){

	//### Submit Form ###//
	$( '#frm_login' ).on( 'submit', function ( event ) {
		event.preventDefault();
		//confirm('ยืนยันการเข้าสู่ระบบ ?', function(){
			var url = "<?php echo site_url('Login/login'); ?>";
			$.ajax({
				type: "POST",
				url: url,
				data: new FormData($("#frm_login")[0]),	// $("#frm_item").serialize(),
				//enctype: 'multipart/form-data',
		        dataType:'html',
		        cache: false,
		        processData: false,
				contentType: false,
		        success: function(data){
			        console.log(data);
		        	//alert( "เข้าสู่ระบบ", "success", "<?php echo site_url('Login/home'); ?>" );
		        	//window.location.href = "<?php echo site_url('Login/home'); ?>";
		        },
	        	error: function(data, errorThrown){
	        		alert("เข้าสู่ระบบไม่สำเร็จ","error");
	        		return false;
	        	}
			});	//-- Ajax.
		//});	//-- Confirm
		
	});	//-- Submit Form.

});
		
</script>