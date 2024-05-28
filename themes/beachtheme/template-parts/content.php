<?php

/*
	
@package sunsettheme
-- Standard Post Format

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
        <div class="title-container">
            <?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
        </div>
        <div class="meta-container">
            <div class="entry-meta">
                <?php echo sunset_posted_meta(); ?>
            </div>
        </div>
    </div>
    
    <div class="entry-content">
        <?php if( has_post_thumbnail() ): ?>
            <div class="standard-featured"><?php the_post_thumbnail(); ?></div>
        <?php endif; ?>
        
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <div class="button-container">
            <a href="<?php the_permalink(); ?>" class="btn btn-default read-more-btn"><?php _e( 'Read More' ); ?></a>
        </div>
    </div><!-- .entry-content -->
    
    <div class="entry-footer">
        <?php echo sunset_posted_footer(); ?>
    </div>
</article>
