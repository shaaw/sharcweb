<div class="container">

	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-6">
					<h2 class="prueba"><?php echo $title; ?></h2>
				</div>
			</div>



			<div class="row margin">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<small><?php echo $news['fecha'].' written by '.$news['autor']['login']?></small>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<pre><?php echo $news['texto'] ?></pre>
						</div>
					</div>
				</div>
			</div>









		</div>
		<div class="col-md-3">
			<a class="twitter-timeline" href="https://twitter.com/shaawdoto" data-widget-id="658615477682487297">Tweets por el @shaawdoto.</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

		</div>
	</div>
</div>