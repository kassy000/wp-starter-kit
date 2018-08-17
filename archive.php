<?php get_header(); ?>
<article>
	<!-- Main -->
	<main class="archive">
		<section class="contents">
			<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
		</section>
	</main>
</article>
<?php get_footer(); ?>
