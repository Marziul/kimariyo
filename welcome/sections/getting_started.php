<div class="getting-started-top-wrap clearfix">
    <div class="theme-steps-list">
        <div class="theme-steps">
            <h3><?php echo esc_html__('Step 1 - Create a new page with "Home Page" Template', 'hashone'); ?></h3>
            <ol>
                <li><?php echo esc_html__('Create a new page (any title like Home )', 'hashone'); ?></li>
                <li><?php echo esc_html__('In right column, select "Home Page" for the option Page Attributes > Template', 'hashone'); ?> </li>
                <li><?php echo esc_html__('Click on Publish', 'hashone'); ?></li>
            </ol>
            <a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('post-new.php?post_type=page')); ?>"><?php echo esc_html__('Create New Page', 'hashone'); ?></a>
        </div>

        <div class="theme-steps">
            <h3><?php echo esc_html__('Step 2 - Set "Your homepage displays" to "A Static Page"', 'hashone'); ?></h3>
            <ol>
                <li><?php echo esc_html__('Go to Appearance > Customize > General settings > Static Front Page', 'hashone'); ?></li>
                <li><?php echo esc_html__('Set "Your homepage displays" to "A Static Page"', 'hashone'); ?></li>
                <li><?php echo esc_html__('In "Homepage", select the page that you created in the step 1', 'hashone'); ?></li>
                <li><?php echo esc_html__('Save changes', 'hashone'); ?></li>
            </ol>
            <a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php echo esc_html__('Assign Static Page', 'hashone'); ?></a>
        </div>

        <div class="theme-steps">
            <h3><?php echo esc_html__('Step 3 - Customizer Options Panel', 'hashone'); ?></h3>
            <p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'hashone'); ?></p>
            <a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'hashone'); ?></a>
        </div>

    </div>

    <div class="theme-image">
        <h3><?php echo esc_html__('Demo Importer', 'hashone'); ?><a href="https://demo.hashthemes.com/<?php echo get_option('stylesheet'); ?>" target="_blank" class="button button-primary"><?php esc_html_e('View Demo', 'hashone'); ?></a></h3>
        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php echo esc_attr__('HashOne Demo', 'hashone'); ?>">

        <div class="theme-import-demo">
            <?php
            $hashone_demo_importer_slug = 'hashthemes-demo-importer';
            $hashone_demo_importer_filename = 'hashthemes-demo-importer';
            $hashone_import_url = '#';

            if ($this->hashone_check_installed_plugin($hashone_demo_importer_slug, $hashone_demo_importer_filename) && !$this->hashone_check_plugin_active_state($hashone_demo_importer_slug, $hashone_demo_importer_filename)) :
                $hashone_import_class = 'button button-primary hashone-activate-plugin';
                $hashone_import_button_text = esc_html__('Activate Demo Importer Plugin', 'hashone');
            elseif ($this->hashone_check_installed_plugin($hashone_demo_importer_slug, $hashone_demo_importer_filename)) :
                $hashone_import_class = 'button button-primary';
                $hashone_import_button_text = esc_html__('Go to Demo Importer Page', 'hashone');
                $hashone_import_url = admin_url('themes.php?page=hdi-demo-importer');
            else :
                $hashone_import_class = 'button button-primary hashone-install-plugin';
                $hashone_import_button_text = esc_html__('Install Demo Importer Plugin', 'hashone');
            endif;
            ?>
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'hashone'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate HashThemes Demo Importer plugin. For more detail documentation on how the demo importer works, click %s.', 'hashone'), '<a href="https://hashthemes.com/documentation/hashone-documentation/#ImportDemoContent" target="_blank">' . esc_html__('here', 'hashone') . '</a>'); ?></p>
            <a data-slug="<?php echo esc_attr($hashone_demo_importer_slug); ?>" data-filename="<?php echo esc_attr($hashone_demo_importer_filename); ?>" class="<?php echo esc_attr($hashone_import_class); ?>" href="<?php echo $hashone_import_url; ?>"><?php echo esc_html($hashone_import_button_text); ?></a>
        </div>
    </div>
</div>