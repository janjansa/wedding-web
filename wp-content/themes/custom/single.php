<?php 
	/*
		Template name: post
	*/
 ?>


<?php get_header(); ?>

    <section class="blog-detail-hero">
				<div class="background-wrapper">
					<img class="background" src="<?php the_field( 'main_image' ); ?>">
				</div>

				<div class="container">
					<p class="date"><?php echo str_replace(".", ". ", get_the_date()); ?></p>
					<h1><?php the_title(); ?></h1>
          			<h4><?php the_field( 'post_summary' ); ?></h4>
				</div>
    </section>
	single.php
    <section class="blog-detail-content">

        <div class="container">
          <?php the_content();?>

        </div>
        
    </section>
	

	<?php get_template_part('includes/section', 'instagram');?>

<?php get_footer(); ?>

