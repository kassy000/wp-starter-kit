<?php get_header(); ?>
<article>
	<!-- Main -->
	<main class="<?php echo get_post_type(); ?>">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			?>
	</main>
</article>
<?php get_footer(); ?>