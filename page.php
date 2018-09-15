<?php get_header(); ?>

<div class="main-container">
    <?php if(have_posts()):
        while(have_posts()) :
            the_post(); ?>

            <div class="row blog-content">
                <div class="breadcrumbs-container row white full-width">
                    <nav class="margin-05" aria-label="You are here:" role="navigation">
                        <ul class="breadcrumbs">
                            <li><a href="<?php echo home_url() ?>">Home</a></li>
                            <?php
                                echo get_post()->post_parent->name;
                            ?>
                            <li>
                                <span class="show-for-sr">Current: </span> <?php the_title(); ?>
                            </li>
                        </ul>
                    </nav>
                </div>
                <header>
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                </header>
                <?php the_content(); ?>
            </div>
        <?php endwhile;
        endif; ?>
</div>

<?php get_footer(); ?>