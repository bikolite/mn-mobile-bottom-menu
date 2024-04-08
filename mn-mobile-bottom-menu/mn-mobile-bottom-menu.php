<?php

/**
 * Plugin Name:       MN Mobile Bottom Menu
 * Plugin URI:        https://wordpress.org/plugins/mn-mobile-bottom-menu/
 * Description:       MN Mobile Bottom Menu is a WordPress plugin that creates a sleek and intuitive bottom navigation menu for mobile devices, improving user experience and accessibility on your website.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Mohammad Naeem
 * Author URI:        http://techboikali.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mnmbm
 */

function mnmbm_load_stylesheet()
{
    // Load CSS
    wp_enqueue_style('mnmbm_menu_style', plugins_url('css/mnmbm-style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'mnmbm_load_stylesheet');

function mnmbm_load_javascript()
{
    // Load Icon
    wp_enqueue_script('mnmbm_icon_script', 'https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js', array(), true);
}
add_action('wp_enqueue_scripts', 'mnmbm_load_javascript');

// Plugin Setting Activation
function mnmbm_mobile_nav_html()
{ ?>
    <nav id="mnmbmMenu">
        <a class="mnmbm-nav-item" href="#">
            <i data-feather="<?php echo get_theme_mod('mnmbm_change_icon_one') ?>"></i><span><?php echo get_theme_mod('mnmbm_change_icon_text_one') ?></span>
        </a>
        <a class="mnmbm-nav-item" href="#">
            <i data-feather="<?php echo get_theme_mod('mnmbm_change_icon_two') ?>"></i><span><?php echo get_theme_mod('mnmbm_change_icon_text_two') ?></span>
        </a>
        <a class="mnmbm-nav-item" href="#">
            <i data-feather="<?php echo get_theme_mod('mnmbm_change_icon_three') ?>"></i><span><?php echo get_theme_mod('mnmbm_change_icon_text_three') ?></span>
        </a>
        <a class="mnmbm-nav-item" href="#">
            <i data-feather="<?php echo get_theme_mod('mnmbm_change_icon_four') ?>"></i><span><?php echo get_theme_mod('mnmbm_change_icon_text_four') ?></span>
        </a>
    </nav>
<?php }
add_action("wp_footer", "mnmbm_mobile_nav_html");

function mnmbm_menu_script()
{ ?>
    <script>
        feather.replace();
        document.querySelector(".mnmbm-nav-item").focus();
    </script>
<?php }
add_action("wp_footer", "mnmbm_menu_script");


// Start Plugin Customization Function
add_action('customize_register', 'mnmbm_plugin_menu_register');
function mnmbm_plugin_menu_register($wp_customize)
{
    // Menu Customization Section Start
    $wp_customize->add_section('mnmbm_menu_section', array(
        'title'       => __('Plugin: Mobile Bottom Menu', 'mnmbm'),
        'description' => __('MN Mobile Bottom Menu is a WordPress plugin that creates a sleek and intuitive bottom navigation menu for mobile devices, improving user experience and accessibility on your website.', 'mnmbm')
    ));

    //  Add Setting and Control for Bottom Menu Background Color.
    $wp_customize->add_setting('mnmbm_menu_background_color', array(
        'default' => '#d30050',
    ));

    $wp_customize->add_control('mnmbm_menu_background_color', array(
        'label'    => __('Choose Background Color', 'mnmbm'),
        'description'   => __('You can choose any color you want for bottom menu. Default is pink color.', 'mnmbm'),
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_menu_background_color',
        'type'     => 'color',
    ));

    //  Add Setting and Control for Bottom Menu Padding.
    $wp_customize->add_setting('mnmbm_menu_padding', array(
        'default' => '0px',
    ));

    $wp_customize->add_control('mnmbm_menu_padding', array(
        'label'    => __('Enter Menu Padding', 'mnmbm'),
        'description' =>  __('Menu Bottom Padding in pixel (Default is: 0px).', 'mnmbm'),
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_menu_padding',
        'type'     => 'text',
    ));

    //  Add Setting and Control for Bottom Menu Icon Color.
    $wp_customize->add_setting('mnmbm_menu_icon_color', array(
        'default' => '#fff',
    ));

    $wp_customize->add_control('mnmbm_menu_icon_color', array(
        'label'    => __('Choose Icon Color', 'mnmbm'),
        'description'   => __('You can choose any color you want for icon. Default is pink color.', 'mnmbm'),
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_menu_icon_color',
        'type'     => 'color',
    ));

    //  Add Setting and Control for Change Icon.
    $wp_customize->add_setting('mnmbm_change_icon_one', array(
        'default' => 'home',
    ));
    $wp_customize->add_control('mnmbm_change_icon_one', array(
        'label'    => __('Enter Feather Icon Name', 'mnmbm'),
        'description'   => __('Please Visit to Feather Icon Site: https://feathericons.com/ and choose your icon if you want just copy the icon name Ex: home', 'mnmbm'),
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_change_icon_one',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('mnmbm_change_icon_two', array(
        'default' => 'activity',
    ));
    $wp_customize->add_control('mnmbm_change_icon_two', array(
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_change_icon_two',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('mnmbm_change_icon_three', array(
        'default' => 'message-square',
    ));
    $wp_customize->add_control('mnmbm_change_icon_three', array(
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_change_icon_three',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('mnmbm_change_icon_four', array(
        'default' => 'settings',
    ));
    $wp_customize->add_control('mnmbm_change_icon_four', array(
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_change_icon_four',
        'type'     => 'text',
    ));

    //  Add Setting and Control for Change Icon Text.
    $wp_customize->add_setting('mnmbm_change_icon_text_one', array(
        'default' => 'Home',
    ));
    $wp_customize->add_control('mnmbm_change_icon_text_one', array(
        'label'    => __('Enter Feather Icon Name', 'mnmbm'),
        'description'   => __('Choose your icon name if you want Ex: Home', 'mnmbm'),
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_change_icon_text_one',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('mnmbm_change_icon_text_two', array(
        'default' => 'Activity',
    ));
    $wp_customize->add_control('mnmbm_change_icon_text_two', array(
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_change_icon_text_two',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('mnmbm_change_icon_text_three', array(
        'default' => 'Message',
    ));
    $wp_customize->add_control('mnmbm_change_icon_text_three', array(
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_change_icon_text_three',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('mnmbm_change_icon_text_four', array(
        'default' => 'Setting',
    ));
    $wp_customize->add_control('mnmbm_change_icon_text_four', array(
        'section'  => 'mnmbm_menu_section',
        'setting'  => 'mnmbm_change_icon_text_four',
        'type'     => 'text',
    ));
}

function mnmbm_cutomize_menu_style()
{ ?>
    <style>
        #mnmbmMenu {
            background-color: <?php echo get_theme_mod('mnmbm_menu_background_color') ?>;
            padding: <?php echo get_theme_mod('mnmbm_menu_padding') ?>;
        }

        .mnmbm-nav-item {
            color: <?php echo get_theme_mod('mnmbm_menu_icon_color') ?>;
        }

        .mnmbm-nav-item:focus {
            color: <?php echo get_theme_mod('mnmbm_menu_icon_color') ?>;
        }
    </style>
<?php }
add_action("wp_head", "mnmbm_cutomize_menu_style");



?>