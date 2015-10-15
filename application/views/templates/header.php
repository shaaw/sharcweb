<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css" />
	<title><?php echo $title; ?></title>
</head>
<body>
	<div class="container">

		<nav id="barra" class="navbar navbar-inverse">

			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">
						Aethere
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
						echo '<a href="" class="navbar-btn btn btn-warning">Admin</a>';
					}
					echo '<div class="navbar-collapse navbar-right">';
					echo '<p class="navbar-text">Bienvenido   ' . $logeado['login'] . '</p></div>' ;
					} ?>

			</div>
		</nav>
		<div class="jumbotron">
			<h2>Hello, world!</h2><pre>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo d tempor incididunt ut labore et dolore magna aliqua. Ut enimad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor </p></p></pre><p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
			</div>
			<ul class="nav nav-pills">
				<li role="presentation" ><a href="#">Home</a></li>
				<li role="presentation"><a href="#">Profile</a></li>
				<li role="presentation"><a href="#">Messages</a></li>
			</ul>