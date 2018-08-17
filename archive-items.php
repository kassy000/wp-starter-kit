<?php get_header(); ?>
<?php
	$post_type = get_post_type();
?>
<article>
	<!-- Main -->
	<main class="archive <?php echo get_post_type();?>">
		<section class="contents">
			<?php get_template_part( 'template-parts/content-archive', get_post_type() ); ?>
		</section>
	</main>
</article>
<?php get_footer(); ?>
