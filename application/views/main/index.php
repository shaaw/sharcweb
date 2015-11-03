
<div class="container">

	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-6">
					<h2 class="prueba"><?php echo $title; ?></h2>
				</div>
			</div>

			<?php foreach ($news as $news_item) {
		# code...
				?>
				<div class="row margin">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<h3><a href="<?php echo base_url() ?>main/news/id/<?php  echo $news_item['id']?>"><?php echo $news_item['titulo'] ?> </a></h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<small><?php echo $news_item['fecha'].' written by '.$news_item['autor']['login']?></small>
							</div>
						</div>
						<div class="row">
							<?php 
							if(empty($news_item['imagen']))
							{
								?>
								<div class="col-md-12">

									<pre style="border-left: 5px solid #<?php echo $news_item['cat']['color'] ?>";><?php echo $news_item['texto']; ?></pre>
								</div>
								<?php
							}else
							{ ?>
							<div class="media col-md-12" >

								<div class="media-left media-middle">
									<a href="<?php echo base_url() ?>main/news/id/<?php  echo $news_item['id']?>">
										<img class="media-object" style="max-width: 128px" src="<?php echo $news_item['imagen'] ?>" alt="..." />
									</a>
								</div>
								<div class="media-body">

								<pre style="white-space: pre-line; border-left: 5px solid #<?php echo $news_item['cat']['color'] ?>" ><?php echo $news_item['texto']; ?></pre>
								</div>
							</div>
							<?php 
						}
						?>
					</div>
				</div>
			</div>
			




			<?php
		}
		echo '<nav><ul class="pagination">';

		echo $pagination;
		?>
	</ul>
</nav>
</div>
<div class="col-md-3">
	<a class="twitter-timeline" href="https://twitter.com/shaawdoto" data-widget-id="658615477682487297">Tweets por el @shaawdoto.</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>
</div>
</div>