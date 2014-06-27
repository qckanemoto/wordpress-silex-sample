<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <p>著者：<?php the_author_posts_link(); ?></p>
    <p>カテゴリ：<?php the_category(); ?></p>
    <p><?php the_tags(); ?></p>
    <p><?php the_content(); ?></p>
<?php endwhile; endif; ?>
