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
	
	<!-- SCRIPT -->
	<script src="<?php echo base_url('assets/js/jquery-3.1.1.slim.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/tether.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">iBrand</a>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="<?php echo base_url('Facebook/logout');?>">
      	Logout
      </a>
    </div>
  </div>
</nav>

<div class="jumbotron">
	<h3>Hello !! <?php echo !empty($user['name'])?$user['name']:'';?></h3> 
	<p>
		<strong>Email: </strong>
		<?php echo !empty($user['email'])?$user['email']:'';?>
	</p>	
</div>

</body>

<footer>
	<p class="footer text-right">
		Page rendered in <strong>{elapsed_time}</strong> seconds. 
		<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</p>
</footer>
</html>