<?php get_header(); ?>
<!-- Main -->
<?php
    $main_class;
    if(is_home()):
        $main_class = 'home';
    else:
        $main_class = get_post_format();
    endif;
?>

<article>
	<main class="<?php echo $main_class;?>">
		<?php if ( have_posts() ) : ?>
			<?php if(is_home()):?>
				<?php get_template_part( 'content','home');?>
			<?php else:?>
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile; ?>
			<?php endif; ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</main>
</article>
<?php get_footer(); ?>


