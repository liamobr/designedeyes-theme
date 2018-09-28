<?php get_header(); ?>

<div class="main-container">
    <div class="row white">
        <nav class="margin-05" aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
                <li><a href="<?php echo home_url() ?>">Home</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Blog
                </li>
            </ul>
        </nav>
    </div>

	<div class="row">
        <div class="blog-content">

            <?php
            if(have_posts()):
                while(have_posts()) : the_post(); ?>

                    <div class="row title">
                        <div class="columns small-11 small-offset-1">
                            <header>
                                <a class="black-text" href="<?php the_permalink(); ?>"><h3 class="blog-title"><?php the_title(); ?></h3></a>
                            </header>
                        </div>
                    </div>

                    <?php the_content('Read more...'); ?>

                    <cite>
                        Posted by <?php the_author_link(); ?> on <?php the_date(); ?>
                    </cite>

                    <hr>
                <?php endwhile;
            endif; ?>
            <div>
                <div class="nav-previous"><?php next_posts_link( '<i class="fas fa-caret-left"></i> Older posts' ); ?></div>
                <div class="nav-next float-right"><?php previous_posts_link( 'Newer posts <i class="fas fa-caret-right"></i>' ); ?></div>
            </div>
        </div>
	</div>
</div>

<?php get_footer(); ?>