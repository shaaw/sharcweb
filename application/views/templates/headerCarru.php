	<div class="conteiner row">
		<div class="col-md-6">
			Banner
		</div>
		<div class="col-md-6">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">


					<?php 

					for ($i = 0 ; $i < count($carrousel); $i++){


						$activo = '';
						if($i === 0)
						{
							$activo = 'class="active"';
						}

						echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" '.$activo.'></li>';

					}


					?>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">



					<?php 

					for ($i = 0 ; $i < count($carrousel); $i++){

						$activo = '';
						if($i === 0)
						{
							$activo = 'active';
						}


						echo '<div class="item '.$activo.'"><a href="'.base_url().'main/news/id/'.$carrousel[$i]['id'].' "><img class="img-responsive" src="'.$carrousel[$i]['imagen'].'" alt="..." />
						<div class="carousel-caption"></a>
							<h2>'.$carrousel[$i]['titulo'].' </h2>
						</div>
					</div>';

				}


				?>






			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

	</div>
</div>