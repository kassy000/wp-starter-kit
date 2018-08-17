<?php get_header(); ?>
<?php
	$post_type = get_post_type();
	$format = $single_format[$post_type];
?>
<article>
	<!-- Main -->
	<main class="single<?php if($post_type) echo ' ' . $post_type;?>">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/single', $format ); ?>
		<?php endwhile;?>
	</main>
</article>
<?php get_footer(); ?>
