<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Register Page</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to Register!</h1>

	<?php
		$error_msg=$this->session->flashdata('error_msg');
        if($error_msg){
        	echo $error_msg;
     	}
	?>

	<div id="body">
		<form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
			<fieldset>
				<div class="form-group">
				<input class="form-control" placeholder="Name" name="user_name" type="text" autofocus>
				</div>

				<div class="form-group">
				<input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
				</div>

				<div class="form-group">
				<input class="form-control" placeholder="Password" name="user_password" type="password" value="">
				</div>

				<div class="form-group">
				<input class="form-control" placeholder="Mobile No" name="user_phone" type="number" value="">
				</div>

				<input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >
			</fieldset>
		</form>
		<center><b>Login Now</b></b><a href="<?php echo('login'); ?>">here</a></center>
	</div>

	<p class="footer">Ram Usage <strong> {memory_usage} </strong> Page rendered in <strong> {elapsed_time} </strong> seconds.
		<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
