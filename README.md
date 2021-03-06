<h1>========== Skeletor ==========</h1>

Contributors: SamuelChuck, Skeletor
Requires at least: 4.7
Tested up to: 5.5.1
Stable tag: 2.0.0
Version: 2.0.0
Requires PHP: 5.4
License: GNU General Public License v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Tags: custom-menu, custom-logo, featured-images, rtl-language-support, threaded-comments, flexible

A lightweight, multipurpose, clean slate theme for Elementor page builder.

***Skeletor*** is distributed under the terms of the GNU GPL v3 or later.

<h3>================== Description ==================</h3>

A basic, clean slate, lightweight theme, best suited for building your site using Elementor page builder.

This theme resets the WordPress environment and prepares it for smooth operation of Elementor.

Screenshot's images & icons are licensed under: Creative Commons (CC0), https://creativecommons.org/publicdomain/zero/1.0/legalcode

<h3>================== Installation ==================</h3>

1. In your site's admin panel, go to Appearance > Themes and click `Add New`.
2. Type "Skeletor" in the search field.
3. Click `Install` and then `Activate` to start using the theme.
4. Navigate to Appearance > Customize in your admin panel and customize to your needs.
5. A notice box may appear, recommending you to install Elementor Page Builder Plugin. You can either use it or any other editor.
6. Create a new page, click `Edit with Elementor`.
7. Once the Elementor Editor is launched, click on the library icon, pick one of the many ready-made templates and click `Insert`.
8. Edit the page content as you wish, you can add, remove and manipulate any of the elements.
9. Enjoy :)

<h3>================== Customizations ==================</h3>

Most users will not need to edit the files for customizing this theme.
To customize your site's appearance, simply use ***Elementor***.

However, if you have a particular need to adapt this theme, please read on.

= Style & Stylesheets =

All of your site's styles should be handled directly inside ***Elementor***.
You should not need to edit the SCSS files in this theme in ordinary circumstances.

However, if for some reason there is still a need to add or change the site's CSS, please use a child theme.

= Hooks =

To prevent the loading of any of the these settings, use the following as boilerplate and add the code to your child-theme `functions.php`:
```php
add_filter( 'choose-from-the-list-below', '__return_false' );
```

* `skeletor_enqueue_style`                 enqueue style
* `skeletor_enqueue_script`                enqueue script
* `skeletor_enqueue_template_style`        load template-specific style (default: load)
* `skeletor_enqueue_template_script`       load template-specific script (default: load)
* `skeletor_enqueue_editor_style`          enqueue editor style
* `skeletor_load_textdomain`               load skeletor's textdomain
* `skeletor_register_menus`                register the Skeletor's default menu location
* `skeletor_add_theme_support`             register the various supported features
* `skeletor_add_woocommerce_support`       register woocommerce features, including product-gallery zoom, swipe & lightbox features
* `skeletor_register_elementor_locations`  register elementor settings
* `skeletor_content_width`                 set default content width to 1000px
* `skeletor_page_title`                    show\hide page title (default: show)
* `skeletor_viewport_content`              modify `content` of `viewport` meta in header

<h3>================== Frequently Asked Questions ==================</h3>

**Does this theme support any plugins?**

Skeletor includes support for WooCommerce.

**Can Font Styles be added thru the Skeletor's css file?**

Yes, ***but*** best practice is to use the styling capabilities in the Elementor plugin.

<h3>================== Copyright ==================</h3>

This theme, like WordPress, is licensed under the GPL.
Use it as your springboard to building a site with ***Elementor***.


<h3>================== Changelog ==================</h3>
= 1.0.0 - 2020-9-23 =
* Initial Public Release
