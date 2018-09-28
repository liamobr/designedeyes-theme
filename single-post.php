<?php get_header(); ?>

<div class="main-container">
	<?php
	if(have_posts()):
	while(have_posts()) : the_post(); ?>

	<div class="row white">
		<nav class="margin-05" aria-label="You are here:" role="navigation">
			<ul class="breadcrumbs">
				<li><a href="<?php echo home_url() ?>">Home</a></li>
                <li><a href="<?php echo home_url() ?>/blog">Blog</a></li>
				<li>
					<span class="show-for-sr">Current: </span> <?php the_title(); ?>
				</li>
			</ul>
		</nav>
	</div>

	<div class="row">
				<div class="blog-content">
					<div class="row title">
						<div class="columns small-11 small-offset-1">
							<header><h3 class="blog-title"><?php the_title(); ?></h3></header>
						</div>
					</div>

					<?php the_content(); ?>

                    <cite>
                        Posted by <?php the_author_link(); ?> on <?php the_date(); ?>
                    </cite>
				</div>
        <?php endwhile;
    endif; ?>
	</div>
</div>

<?php get_footer(); ?>