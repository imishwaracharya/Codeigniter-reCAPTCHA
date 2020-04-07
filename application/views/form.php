<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>reCAPTCHA for CodeIgniter</title>

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
	.heading{
		font-size: 15px;
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
	label {
		
		display:block;
		font-weight: bold;
	}
	input[type=text] {
		
		display:block;
		width: 350px;
		padding: 15px 22px;
		margin: 10px 0;
		box-sizing: border-box;  
	}
	
	input[type=submit] {
		
		display:block;
		background-color: #8842d5;
		border: none;
		color: white;
		padding: 18px 36px;
		text-decoration: none;
		margin: 5px 0;
		cursor: pointer;  
	}
	.error-msg{
		color: red;
		display:block;
		margin-bottom: 10px;
	}
	.form-response-box {
		display:block;
		margin: 20px 0;
		padding: 20px;
		border: 2px solid #4CAF50
	}
	.form-response-box h2 {
		display: block;
		color: #4CAF50;
		font-size: 19px;
		font-weight: normal;
		margin: 10px 0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Example: CodeIgniter reCAPTCHA form</h1>

	<div id="body">

	<?php if ($this->session->has_userdata('message') == true) {?>
	
		<?php echo $this->session->flashdata('message');?>
		
	<?php }?>
	
		<p class="heading">Fill all details then click submit. Click here for full <a href="user_guide/">article</a>.</p>
		
		
		<form method="post" action="<?php echo site_url('Recaptcha_form');?>">
		
		<label for="name">Your name:</label>
		<input type="text" id="name" name="name" placeholder="Eg. John Doe">
		<?php echo form_error('name','<span class="error-msg">','</span>');?>
		
		<label for="email">Your E-mail:</label>
		<input type="text" id="email" name="email" placeholder="Eg. email@example.com">
		<?php echo form_error('email','<span class="error-msg">','</span>');?>
		
		<?php echo $this->recaptcha->getWidget(); ?>
		<?php echo $this->recaptcha->getScriptTag(); ?>
		<?php echo form_error('g-recaptcha-response','<span class="error-msg">','</span>');?>
		
		<input type="submit" value="Submit">
		
		<form>
		
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>