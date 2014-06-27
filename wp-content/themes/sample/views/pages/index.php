<h1><?php bloginfo('name'); ?></h1>

<h2>最新の投稿10件</h2>
<?php query_posts('post_type=post&posts_per_page=10'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h3><?php the_title(); ?></h3>
    <p>著者：<?php the_author_posts_link(); ?></p>
    <p>カテゴリ：<?php the_category(); ?></p>
    <p><?php the_tags(); ?></p>
    <p><?php the_content(); ?></p>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>

<hr/>

<h2>固定ページ</h2>
<ul>
    <li><a href="<?php echo home_url('aaa/'); ?>">/aaa/</a></li>
    <li><a href="<?php echo home_url('aaa/bbb'); ?>">/aaa/bbb</a></li>
    <li><a href="<?php echo home_url('ccc'); ?>">/ccc</a></li>
</ul>
