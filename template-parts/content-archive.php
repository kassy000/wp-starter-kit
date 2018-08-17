        <?php
            global $args;
            $args = array(
            'post_type' => 'news',
            'term_name' => 'term-news'
        ); ?>
    <!-- From here News -->
    <div class="post-<?php echo get_post_type() ?>">
        <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/contents-loop', get_post_type());
            endwhile;
        ?>
    </div>
    <!-- up to here News -->
