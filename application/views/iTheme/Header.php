<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Welcome to CodeIgniter Login with Facebook</title>
	
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2/sweetalert2.css');?>">
	
	<!-- SCRIPT -->
	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/tether.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/sweetalert2/sweetalert2.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/function_main.js');?>"></script>	
	
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
  	<a class="navbar-brand" href="#">iBrand</a>
  	<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    	<div class="navbar-nav">
	    	<?php if(empty($user_id)){ ?>
	    	<a class="nav-item nav-link" href="<?php echo base_url('Register/index');?>">Register</a>
			<a class="nav-item nav-link" href="<?php echo base_url('Login/login');?>">Login</a>
	      	<a class="nav-item nav-link" href="<?php echo !empty($url)?$url:'';?>">Login with Facebook</a>
	      	<?php }else{ ?>
	      	<i class="nav-item nav-link"><?php echo !empty($username)?$username:'';?></i>
	      	<a class="nav-item nav-link" href="<?php echo base_url('Login/logout');?>">Logout</a>
			<?php } ?>
    	</div>
  	</div>
</nav>