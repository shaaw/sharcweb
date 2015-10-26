<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css" />
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.js" ></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/mio.js" ></script>
	<title><?php echo $title; ?></title>
</head>
<body>
	<div class="container">

		<nav id="barra" class="navbar navbar-inverse">

			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">
						Kosmo
					</a>
				</div>

				<?php

				if(empty($logeado))
				{
					$attributes = array('class' => 'navbar-form navbar-right');
					echo form_open(base_url().'main/login',$attributes); ?>
					<div class="form-group">
						<input type="login" name="login" class="form-control" placeholder="Login">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-success">Log In</button>
					<a href="<?php echo base_url(); ?>main/singin" type="button" class="btn btn-warning">Sing in</a>
				</form>

				<?php
			}else{
				
				

				if($logeado['permisos'] == 2)
				{
					echo '<a href="'. base_url().'admin/" class="navbar-btn btn btn-warning">Admin</a>';
				}
				echo '<div class="navbar-collapse navbar-right">';
				echo '<p class="navbar-text">Bienvenido   ' . $logeado['login'] . '</p></div>' ;
			} ?>

		</div>
	</nav>
    <ul class="nav nav-pills">
        <li role="presentation" ><a href="<?php echo base_url(); ?>">Home</a></li>
        <li role="presentation"><a href="#">Game guide</a></li>
        <li role="presentation"><a href="#">Gallery</a></li>
        <li role="presentation"><a href="#">Forum</a></li>
    </ul>