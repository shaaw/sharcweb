	<h2 class="prueba"><?php echo $title; ?></h2>


<ul class="nav nav-pills">
	<li role="presentation" ><a href="<?php echo base_url() ?>admin/">News</a></li>
	<li role="presentation" ><a href="<?php echo base_url() ?>admin/categories">Categories</a></li>
	<li role="presentation"><a href="#">Users</a></li>
	<li role="presentation"><a href="#">Galery</a></li>
</ul>
<div class="container">
	<div class="row margin">
		<div class="col-md-2"><a href="<?php echo base_url() ?>admin/createCat" type="button" class="btn btn-success" aria-label="Left Align">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		</a></div>

	</div>
	<div class="row margin">
		<div class="col-md-2"><h3>Name</h3></div>
		<div class="col-md-2"><h3>Color</h3></div>
		<div class="col-md-2"></div>
		<div class="col-md-2"></div>
		<div class="col-md-2"></div>
	</div>
	<div class="row margin">
		<hr />
	</div>

	<?php foreach ($categories as $cat) {
	?>
	<div class="row margin">
		<div class="col-md-2"><a class="vcenter"><?php echo $cat['nombre'] ?></a></div>
		<div class="col-md-2"><p style="background-color:#<?php echo $cat['color'] ?> ;color:#ffffff" class="vcenter"><?php echo $cat['color'] ?></p></div>
		<div class="col-md-2"></div>
		<div class="col-md-1"><a type="button" href="<?php echo base_url().'admin' ?>" class="btn btn-warning" aria-label="Left Align"><span class="glyphicon glyphicon-pencil"   aria-hidden="true"></span></a></div>
		<div class="col-md-1"><a type="button" href="<?php echo base_url().'admin/deleteCat/id/'.$cat['id'] ?>" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"  aria-hidden="true"></span></a></div>
	</div>
	<?php
	}
	?>
	
</div>