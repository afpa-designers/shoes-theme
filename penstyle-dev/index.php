<?php get_header(); ?>   
    <div class="container">
        <div class="blog-header">
            <h1 class="blog-title">Exemple de thème WordPress</h1>
            <p class="lead blog-description">Création d'un thème WordPress à titre de tutoriel sur WP Pour Les Nuls.</p>
        </div>
        <div class="row">
            <div class="col-sm-8 blog-main">
                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                ?>
                     <?php get_template_part('content', get_post_format() ); ?>
                <?php
                endwhile; endif;
                ?>
            </div>
            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div><!-- /.row -->
        <div class="row">
            <?php $loop = new WP_Query( array( 'post_type' => 'ingredients',  'posts_per_page' => '1' ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php get_template_part('content-ingredients', get_post_format() ); ?>

            <?php endwhile;
            wp_reset_query(); ?>
        </div>
    </div><!-- /.container -->
<?php get_footer(); ?>   