<?php
/*

Template Name: Resumè

*/

get_header(); ?>

	<div id="primary" class="content-area fullwidth">
		<main id="main" class="site-main" role="main">
			<?php	while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<img src="<?php echo CFS()->get( 'photo' )?>" class="profile img-thumbnail" alt="Profile Rafael Goulart">
				<h2><?php echo CFS()->get( 'name' ); ?></h2>
				<ul>
					<li><?php echo CFS()->get( 'title' ); ?></li>
					<li><?php echo CFS()->get( 'email' ); ?></li>
					<li><?php echo CFS()->get( 'mobile' ); ?></li>
				</ul>

				<?php echo CFS()->get( 'about' ); ?>

				<h3>Links</h3>
				<ul>
				<?php
				$links = CFS()->get( 'links' );
					if (count($links)) :
						foreach ( $links as $f ) :
							$label = array_shift($f['type']);
				?>
							<li>
								<a href="<?php echo $f['url'] ?>">
								<?php  echo $label ?>
								</a>
							</li>
				<?php
						endforeach;
					endif;
				?>
				</ul>

				<h3>Skills</h3>

				<div class="row">
				<?php
				$skills = CFS()->get( 'skills' );
				if (count($skills)) :
					$levels = array(
						1 => array('style' => 'progress-bar-danger', 'valuenow' => '20'),
						2 => array('style' => 'progress-bar-warning', 'valuenow' => '40'),
						3 => array('style' => 'progress-bar-info', 'valuenow' => '60'),
						4 => array('style' => '', 'valuenow' => '80'),
						5 => array('style' => 'progress-bar-success', 'valuenow' => '100'),
					);
					foreach ( $skills as $f ) :
						$name    = $f['name'];
						$years   = array_shift($f['years']);
						$levelId = key($f['level']);
						$level   = current($f['level']);
						$bar = $levels[$levelId];
				?>
					<div class="col-lg-4 col-sm-6">
						<div class="progress">
							<div class="progress-bar <?php echo $bar['style'] ?>" role="progressbar" aria-valuenow="<?php echo $bar['valuenow'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $bar['valuenow'] ?>%;"></div>
							<span class="progress-type"><?php echo $name ?> (<?php echo $years ?> <?php echo ($years == 1 ? 'year' : 'years') ?>)</span>
							<span class="progress-completed"><?php echo $level ?></span>
						</div>
					</div>

				<?php
					endforeach;
				endif;
				?>
				</div>

				<h3>Experience</h3>

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php
				$experiences = CFS()->get( 'experience' );
				if (count($experiences)) :
					// print_r($experiences);
					foreach ( $experiences as $k => $f ) :
						$jobTitle    = $f['job_title'];
						$companyName = $f['company_name'];
						$location    = $f['location'];
						$telecommute = $f['telecommute'];
						$presentJob  = $f['present_job'];
						$description = $f['description'];
						$presentJob  = $f['present_job'];
						$startDate   = new DateTime($f['start_date']);
						$endDate     = !empty($f['end_date']) ? new DateTime($f['end_date']) : false;
						$period = $startDate->format('M Y')
						        . ' '
										. ($presentJob
											? ' to present'
											: ($endDate instanceof DateTime
												? ' to ' . $endDate->format('M Y')
												: ''));
				?>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading<?php echo $k ?>">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $k ?>" aria-expanded="false" aria-controls="collapse<?php echo $k ?>">
									<?php echo $jobTitle ?> <small><?php echo $period ?></small>
								</a>
							</h4>
						</div>
						<div id="collapse<?php echo $k ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $k ?>">
							<div class="panel-body">
								<p><?php echo $companyName ?> - <?php echo $location ?></p>
								<?php if ($telecommute) : ?><p>Telecommute</p><?php endif; ?>
								<p><?php echo $description ?></p>
							</div>
						</div>
					</div>
				<?php
					endforeach;
				endif;
				?>
				</div>

				<h3>Education</h3>

				<?php
				$educations = CFS()->get( 'education' );
				if (count($educations)) :
					foreach ( $educations as $f ) :
						$title       = $f['title'];
						$institution = $f['institution'];
						$degree      = array_shift($f['degree']);
						$year        = $f['year'];
				?>
					<p>
						<strong><?php echo $title ?> <small>(<?php echo $degree ?>)</small></strong><br/>
						<?php echo $institution ?> (<?php echo $year ?>)
					</p>
				<?php
					endforeach;
				endif;
				?>

				<h3>Certifications</h3>

				<ul>
				<?php
				$certifications = CFS()->get( 'certifications' );
				if (count($certifications)) :
					foreach ( $certifications as $f ) :
						$year = $f['year'];
						$name = $f['name'];
				?>
					<li><?php echo $name ?> <small>(<?php echo $year ?>)</small></li>
				<?php
					endforeach;
				endif;
				?>
				</ul>

			<?php endwhile;  ?>

			<div class="well">
				<p>This resumè was built using:</p>
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

<?php
get_footer();
