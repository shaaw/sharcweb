<h2 class="prueba"><?php echo $title; ?></h2>


<ul class="nav nav-pills">
	<li role="presentation" ><a href="<?php echo base_url() ?>admin/">News</a></li>
	<li role="presentation" ><a href="<?php echo base_url() ?>admin/categories">Categories</a></li>
	<li role="presentation"><a href="<?php echo base_url() ?>admin/carrusel">Carrusel</a></li>
	<li role="presentation"><a href="#">Galery</a></li>
</ul>
<div class="container">
	<div class="row margin">
		<div class="col-md-2"><a href="<?php echo base_url() ?>admin/create" type="button" class="btn btn-success" aria-label="Left Align">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		</a></div>

	</div>
	<div class="row margin">
		<div class="col-md-2"><h3>Title</h3></div>
		<div class="col-md-2"><h3>Author</h3></div>
		<div class="col-md-2"><h3>Date</h3></div>
		<div class="col-md-2"><h3>Category</h3></div>
		<div class="col-md-2"><h3>Carrusel</h3></div>

	</div>
	<div class="row margin">
		<hr />
	</div>

	<?php foreach ($news as $news_item)
	{
		# code...
		?>
		<div class="row margin">
			<div class="col-md-2"><a ><?php echo $news_item['titulo'] ?></a></div>
			<div class="col-md-2"><p ><?php echo $news_item['autor']['login'] ?></p></div>
			<div class="col-md-2"><p ><?php echo $news_item['fecha'] ?></p></div>
			<div class="col-md-2"><p style="color:#<?php echo $news_item['cat']['color'] ?>"><?php echo $news_item['cat']['nombre'] ?></p></div>

			<?php

			if($news_item['imagen'] != "")
			{
				if($news_item['carrousel'] == '1')
				{
					?>
					<div id="GtR" class="col-md-2"><a id="GtR1" type="button" href="<?php echo base_url().'admin/removeCarrousel/id/'.$news_item['id'] ?>" class="btn btn-success" aria-label="Left Align"><span id="GtR2" class="glyphicon glyphicon-minus"   aria-hidden="true"></span></a></div>


					<?php  
				}else
				{

					?>
					<div id="RtG"  class="col-md-2"><a id="RtG1" type="button" href="<?php echo base_url().'admin/setCarrousel/id/'.$news_item['id'] ?>" class="btn btn-danger" aria-label="Left Align"><span id="RtG2" class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></div>


					<?php

				}
			}else
			{
				echo "<div class='col-md-2'> </div>";
			}
			?>

		</div>

		<?php
	}
	?>
			<script type="text/javascript">
			$("#GtR1").mouseover(function()
			{
				$("#GtR1").addClass("btn-danger").removeClass("btn-success");
				$("#GtR2").addClass("glyphicon-plus").removeClass("glyphicon-minus");
			})

			$("#RtG1").mouseover(function()
			{
				$("#RtG1").addClass("btn-success").removeClass("btn-danger");
				$("#RtG2").addClass("glyphicon-minus").removeClass("glyphicon-plus");
			})

			$("#RtG1").mouseout(function()
			{
				$("#RtG1").addClass("btn-danger").removeClass("btn-success");
				$("#RtG2").addClass("glyphicon-plus").removeClass("glyphicon-minus");
			})

			$("#GtR1").mouseout(function()
			{
				$("#GtR1").addClass("btn-success").removeClass("btn-danger");
				$("#GtR2").addClass("glyphicon-minus").removeClass("glyphicon-plus");
			})
		</script>
</div>