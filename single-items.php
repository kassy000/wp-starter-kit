<?php get_header(); ?>
<?php
	$post_type = get_post_type();
?>
<article>
	<!-- Main -->
	<main class="single <?php echo get_post_type() ?>">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>
		<?php endwhile;?>
	</main>
</article>
<?php get_footer(); ?>
