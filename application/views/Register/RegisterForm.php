		
			
<div class="container-fluid">
	<div style="margin-top: 15px;">
	
		<?php echo form_open("Register/RegisterData", array('id' => 'frm_register'));?>
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<?php 
							echo form_label("FirstName","FirstName");
							echo form_input(array(	'name' 			=> 'FirstName',
													'id' 			=> 'FirstName',
                    								'class' 		=> 'form-control',
													'placeholder'	=> 'FirstName',
                    								'required'		=> ''
							),!empty($FirstName)?$FirstName:'');
						?>
				  	</div>
				  	
				</div>
				<div class="col-3">
					<div class="form-group">
						<?php 
							echo form_label("LastName","LastName");
							echo form_input(array(	'name' 			=> 'LastName',
													'id' 			=> 'LastName',
                    								'class' 		=> 'form-control',
													'placeholder'	=> 'LastName',
                    								'required'		=> ''
							),!empty($LastName)?$LastName:'');
						?>
				  	</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<?php 
							echo form_label("Email Address","Email");
							echo form_input(array(	'name' 				=> 'Email',
													'id' 				=> 'Email',
													'type'				=> 'email',
                    								'class' 			=> 'form-control',
													'placeholder'		=> 'Email Address',
													'aria-describedby'	=> 'emailHelp',
                    								'required'			=> ''
							),!empty($Email)?$Email:'');
						?>
			  		</div>
		  		</div>
			</div>
			
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<?php 
							echo form_label("Confirm Email","ConfirmEmail");
							echo form_input(array(	'name' 				=> 'ConfirmEmail',
													'id' 				=> 'ConfirmEmail',
													'type'				=> 'email',
                    								'class' 			=> 'form-control',
													'placeholder'		=> 'Confirm Email Address',
													'aria-describedby'	=> 'emailHelp',
                    								'required'			=> ''
							),!empty($ConfirmEmail)?$ConfirmEmail:'');
						?>
		  			</div>
	  			</div>
			</div>
			
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<?php 
							echo form_label("Password","Password");
							echo form_input(array(	'name' 				=> 'Password',
													'id' 				=> 'Password',
													'type'				=> 'password',
                    								'class' 			=> 'form-control',
													'placeholder'		=> 'Password',
                    								'required'			=> ''
							),!empty($Password)?$Password:'');
						?>
		  			</div>
	  			</div>
			</div>
	  		
	  		<div class="row">
	  			<div class="col-6">
		  			<div class="form-group">
		  				<?php 
							echo form_label("Birthday","Birthday");
							echo form_input(array(	'name' 				=> 'Birthday',
													'id' 				=> 'Birthday',
													'type'				=> 'text',
                    								'class' 			=> 'form-control',
													'placeholder'		=> 'Birthday',
                    								'required'			=> ''
							),!empty($Birthday)?$Birthday:'');
						?>
		  			</div>
	  			</div>
	  		</div>
	  		
	  		<div class="row">
	  			<div class="col-6">
			  		<fieldset class="form-group">
					    <div class="form-check">
					      <label class="form-check-label">
					        	<input type="radio" class="form-check-input" name="Gender" id="female" value="1">
					        	Female &nbsp;&nbsp;
					      </label>
					      <label class="form-check-label">
					        	<input type="radio" class="form-check-input" name="Gender" id="male" value="2">
					        	Male
					      </label>
					    </div>
			  		</fieldset>
		  		</div>
	  		</div>
	  		
	  		<div class="row">
	  			<div class="col-6">
		  			<div class="form-group">
		  				<button type="submit" class="btn btn-secondary btn-block">Register</button>
		  			</div>
	  			</div>
	  		</div>
	  		
		<?php echo form_close();?>
	</div>
	
</div>

<script>

$(function(){
	
	//### Submit Form ###//
	$( '#frm_register' ).on( 'submit', function ( event ) {
		event.preventDefault();
		confirm('ยืนยันการบันทึกข้อมูล ?', function(){
			var url = "<?php echo site_url('Register/RegisterData'); ?>";
			$.ajax({
				type: "POST",
				url: url,
				data: new FormData($("#frm_register")[0]),	// $("#frm_item").serialize(),
				//enctype: 'multipart/form-data',
		        dataType:'html',
		        cache: false,
		        processData: false,
				contentType: false,
		        success: function(data){
		        	alert( "บันทึกข้อมูลเรียบร้อย", "success", "<?php echo site_url('Register/index'); ?>" );
		        },
	        	error: function(data, errorThrown){
	        		alert("บันทึกข้อมูลไม่สำเร็จ","error");
	        		return false;
	        	}
			});	//-- Ajax.
		});	//-- Confirm
		
	});	//-- Submit Form.
	
})//end $(function()
	
</script>
