<?php
/*
Template Name: Portfolio
*/

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main container" role="main">

		<?php	while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<div class="row portfolio">
			<?php
			$items = CFS()->get( 'items' );
			foreach ( $items as $k => $f ) :
				$title       = $f['title'];
				$url         = $f['url'];
				$description = $f['description'];
				$images      = $f['images'];
				$cover       = array_shift($f['images'])['image'];
			?>
				<div class="col-xs-12 col-sm-6">
						<div class="panel panel-default">
								<div class="panel-heading"><strong><?php echo $title ?></strong></div>
								<div class="panel-image" data-toggle="modal" data-target="#portfolioModal" data-item="<?php echo $k ?>">
										<img src="<?php echo $cover ?>" />
								</div>
						</div>
				</div>
			<?php endforeach; ?>
			</div>
		<?php endwhile;  ?>

		<div class="well">
			<p>This portfolio was built using:</p>
			<ul>
				<li>
					<a href="/rafaelgou/wp-portfolio-resume-custom-fields/master/wordpress.org">Wordpress</a>
				</li>
				<li>
					<a href="https://wordpress.org/plugins/custom-field-suite/" rel="nofollow noreferrer" target="_blank">Custom Fields Suite</a>
				</li>
				<li>
					<a href="http://getbootstrap.com" rel="nofollow noreferrer" target="_blank">Twitter Bootstrap</a>
				</li>
			</ul>
			<p>
				If you want to build something like that in your website, please see
				how I did this here on it
				<a href="https://github.com/rafaelgou/wp-portfolio-resume-custom-fields" rel="nofollow noreferrer" target="_blank">
					GitHub repository
				</a>
			</p>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<div class="modal" id="portfolioModal" tabindex="-1" role="dialog" aria-labelledby="portfolioModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="portfolio-title"></h4>
      </div>
      <div class="modal-body">

				<div class="row">
					<div class="col-md-8">
						<div class="modal-images carousel slide" id="modalImagesCarousel" data-ride="carousel">

							<!-- Indicators -->
							<ol class="carousel-indicators"></ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox"></div>

						  <!-- Controls -->
						  <a class="left carousel-control" href="#modalImagesCarousel" role="button" data-slide="prev">
						    <span class="fa fa-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#modalImagesCarousel" role="button" data-slide="next">
						    <span class="fa fa-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>

							<hr/>

							<ul class="nav nav-pills nav-justified"></ul>
						</div>
					</div>
					<div class="col-md-4 text-left">
						<h3 class="modal-title" id="portfolio-title"></h3>
						<p class="modal-url">
							<a href="" target="_blank"><span>Link here </span> <i class="fa fa-external-link"></i></a>
						</p>
						<p class="modal-description"></p>
						<p class="modal-tags"></p>
						<div class="clearfix"></div>
					</div>

				</div>
      </div>

    </div>
  </div>
</div>


<script>
	var portfolioItems = <?php echo json_encode(CFS()->get( 'items' )) ?>;
</script>
<?php
get_footer();
