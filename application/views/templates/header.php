<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css" />

    <?php

         if(!empty($logeado) && $logeado['login'] == 'arcaisa')
                {

        echo '<link rel="stylesheet" type="text/css" href="' .base_url().'assets/css/cumple.css" />';
    }
                     ?>
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.js" ></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/mio.js" ></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jscolor.js" ></script>
    <script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
    <link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" />
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
                    $attributes = array('class' => 'navbar-form navbar-right navbar-collapse');
                    echo form_open(base_url().'main/login',$attributes); ?>
                    <div class="form-group">
                        <input type="login" size="15" name="login" class="form-control" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <input type="password" size="15" name="password" class="form-control" placeholder="Password">
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
                if($logeado['login'] == 'arcaisa')
                {
                       echo '<a id="cumple" href="'. base_url().'admin/cumpleanos" class="navbar-btn btn btn-warning">ENTRA!!</a>';
                }

                echo '<div class="navbar-collapse navbar-right">';
                echo '<p class="navbar-text">Bienvenido   ' . $logeado['login'] . '</p><a href="'. base_url().'main/logout" class="navbar-btn btn btn-warning">Logout!!</a></div>' ;
            } ?>

        </div>
    </nav>

    
