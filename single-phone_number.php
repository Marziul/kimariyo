<?php
/**
 * The template for displaying all single posts.
 *
 * @package HashOne
 */
get_header();
?>

<header class="hs-main-header">
    <div class="hs-container">
        <?php the_title('<h1 class="hs-main-title">', '</h1>'); ?>
        <?php hashone_breadcrumbs(); ?>
    </div>
</header><!-- .entry-header -->

<div class="hs-container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while (have_posts()) : the_post(); ?>

                <?php 
                	the_content();
                ?>
                
                <div class="numara-detay d-sm-flex align-items-center">
					<div class="numara_img">
						
						 <?php 
							the_title();
						?>
						
					</div>
					
					<div class="numara-detay-icerik">
						<h2 class="my-3"><?php the_field('phone_title'); ?></h2> 
                		<?php the_field('phone_info'); ?>
                
                	</div>
                </div>
                
                <div class="post-meta clearfix">

<h4 class="text-primary"><?php the_field('phone_number_list_title'); ?></h4>  

<?php

if( have_rows('number_list') ):
    while( have_rows('number_list') ) : the_row(); ?>
    
<span class="after-tag"><?php the_sub_field('phone_number_item'); ?></span>  
       
<?php    
    endwhile;

// No value.
else :
    // Do something...
endif;
?>


</div>
			
			<?php
	
		
 
if ( $comments ) {
     
    foreach ( $comments as $comment ) {
         
        print_r($comment);
         
    }
     
} else {
     
    // Display message because there are no comments.
     
}
 
?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
			
			

            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar(); ?>

</div>

<?php
get_footer();