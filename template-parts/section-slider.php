<?php
/**
 *
 * @package HashOne
 */
?>

<section id="hs-home-slider-section">
    <div class="slide-banner-overlay"></div>
    <div id="hs-bx-slider" class="owl-carousel">
        <?php
        for ($i = 1; $i < 4; $i++) {
            $hashone_slider_page_id = get_theme_mod('hashone_slider_page' . $i);

            if ($hashone_slider_page_id) {
                $args = array(
                    'page_id' => absint($hashone_slider_page_id)
                );
                $query = new WP_Query($args);
                if ($query->have_posts()):
                    while ($query->have_posts()) : $query->the_post();
                        ?>
                        <div class="hs-slide">
                            <div class="hs-slide-overlay"></div>

                            <?php
                            if (has_post_thumbnail()) {
                                $hashone_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                echo '<img alt="' . esc_attr(get_the_title()) . '" src="' . esc_url($hashone_slider_image[0]) . '">';
                            }
                            ?>

                            <div class="hs-slide-caption">
                                <div class="hs-slide-cap-title">
                                    <span><?php echo esc_html(get_the_title()); ?></span>
                                </div>

                                <div class="hs-slide-cap-desc">
                                    <?php echo get_the_content(); ?>
									
									<div class="input-group" style="background-color: white;border-radius: 26px;height: 60px;width: 80%;padding-top: 6px;margin: auto;">
 
										
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
		 <i class="fa fa-phone" style="color:black;"></i>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input style="font-size: inherit;font-weight: bold;vertical-align: unset;" type="search" class="search-field form-control none outline-none"
            placeholder="<?php echo esc_attr_x( '0___ ___ __ __', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
		<button style="position: relative; top: -7px;">
		<i class="fa fa-search fa-lg" style="padding-right: 10px;"></i>
    <input type="submit" class="search-submit btn none btn-primary"
        value="<?php echo esc_attr_x( 'Arama', 'submit button' ) ?>" style="font-size: inherit;font-weight: bold;" />
		</button>
</form>

</div>

									
                                </div>
								
								
								 <div class="hs-search-bar">
	
									 
                                </div>
								
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
            }
        }
        ?>
    </div>
</section>