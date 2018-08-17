<?php get_header(); ?>
<article>
	<!-- Main -->
	<?php $prefix = "not_found"?>
	<main class="<?php echo $prefix;?>">
		<?php $prefix_mv = "mv";?>
		<section class="<?php echo $prefix_mv; ?> <?php echo $prefix_mv . $bem_m . 'a';?>">
			<?php text_domain_post_thumbnail(); ?>
		</section>
		
		<section class="heading">
			<h1>お探しのページは見つかりませんでした。</h1>
			<p>お探しのページは一時的にアクセスできない状況にあるか、移動もしくは削除された可能性があります。</p>
			<a class="align_right display_inline_block float_right margin_bottom_30px" href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る</a>
		</section>
		
		
	</main>
</article>
<?php get_footer(); ?>