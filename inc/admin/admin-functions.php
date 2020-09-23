<?php

/**
 * Skeletor admin functions.
 *
 * @package Skeletor
 */

/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @return void
 */
function skeletor_fail_load_admin_notice()
{
	// Leave to Elementor Pro to manage this.
	if (function_exists('elementor_pro_load_plugin')) {
		return;
	}

	$screen = get_current_screen();
	if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
		return;
	}

	if ('true' === get_user_meta(get_current_user_id(), '_skeletor_install_notice', true)) {
		return;
	}

	$plugin = 'elementor/elementor.php';

	$installed_plugins = get_plugins();

	$is_elementor_installed = isset($installed_plugins[$plugin]);

	if ($is_elementor_installed) {
		if (!current_user_can('activate_plugins')) {
			return;
		}

		$message = __('Skeletor is a lightweight, multipurpose, clean slate theme designed to work perfectly with Elementor Page Builder plugin.', 'skeletor');

		$button_text = __('Activate Elementor', 'skeletor');
		$button_link = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);
	} else {
		if (!current_user_can('install_plugins')) {
			return;
		}

		$message = __('Skeletor is a lightweight clean slate theme. We recommend you use it together with Elementor Website Builder plugin, they work perfectly together!', 'skeletor');

		$button_text = __('Install Elementor', 'skeletor');
		$button_link = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
	}

?>
	<style>
		.notice.skeletor-notice {
			border-left-color: #9b0a46 !important;
			padding: 20px;
		}

		.rtl .notice.skeletor-notice {
			border-right-color: #9b0a46 !important;
		}

		.notice.skeletor-notice .skeletor-notice-inner {
			display: table;
			width: 100%;
		}

		.notice.skeletor-notice .skeletor-notice-inner .skeletor-notice-icon,
		.notice.skeletor-notice .skeletor-notice-inner .skeletor-notice-content,
		.notice.skeletor-notice .skeletor-notice-inner .skeletor-install {
			display: table-cell;
			vertical-align: middle;
		}

		.notice.skeletor-notice .skeletor-notice-icon {
			color: #9b0a46;
			font-size: 50px;
			width: 50px;
		}

		.notice.skeletor-notice .skeletor-notice-content {
			padding: 0 20px;
		}

		.notice.skeletor-notice p {
			padding: 0;
			margin: 0;
		}

		.notice.skeletor-notice h3 {
			margin: 0 0 5px;
		}

		.notice.skeletor-notice .skeletor-install {
			text-align: center;
		}

		.notice.skeletor-notice .skeletor-install.skeletor-install-button {
			padding: 5px 30px;
			height: auto;
			line-height: 20px;
			text-transform: capitalize;
		}

		.notice.skeletor-notice .skeletor-install.skeletor-install-button i {
			padding-right: 5px;
		}

		.rtl .notice.skeletor-notice .skeletor-install.skeletor-install-button i {
			padding-right: 0;
			padding-left: 5px;
		}

		.notice.skeletor-notice .skeletor-install.skeletor-install-button:active {
			transform: translateY(1px);
		}

		@media (max-width: 767px) {
			.notice.skeletor-notice {
				padding: 10px;
			}

			.notice.skeletor-notice .skeletor-notice-inner {
				display: block;
			}

			.notice.skeletor-notice .skeletor-notice-inner .skeletor-notice-content {
				display: block;
				padding: 0;
			}

			.notice.skeletor-notice .skeletor-notice-inner .skeletor-notice-icon,
			.notice.skeletor-notice .skeletor-notice-inner .skeletor-install {
				display: none;
			}
		}
	</style>
	<script>
		jQuery(function($) {
			$('div.notice.skeletor-install-elementor').on('click', 'button.notice-dismiss', function(event) {
				event.preventDefault();

				$.post(ajaxurl, {
					action: 'skeletor_set_admin_notice_viewed'
				});
			});
		});
	</script>
	<div class="notice updated is-dismissible skeletor-notice skeletor-install-elementor">
		<div class="skeletor-notice-inner">
			<div class="skeletor-notice-icon">
				<img src="<?php echo esc_url(SKELETOR_ASSETS_URI . '/' . 'images' . '/' . 'elementor_logo_gradient' . '.png'); ?>" width='60px' alt="Elementor Logo" />
			</div>

			<div class="skeletor-notice-content">
				<h3><?php esc_html_e('Thanks for installing Skeletor Theme!', 'skeletor'); ?></h3>
				<p>
					<p><?php echo esc_html($message); ?></p>
					<a href="https://elementor.com/" target="_blank"><?php esc_html_e('Learn more about Elementor', 'skeletor'); ?></a>
				</p>
			</div>

			<div class="skeletor-install ">
				<a class="button button-primary skeletor-install skeletor-install-button" href="<?php echo esc_attr($button_link); ?>"><i class="dashicons dashicons-download"></i><?php echo esc_html($button_text); ?></a>
			</div>
		</div>
	</div>
<?php
}


/**
 * Set Admin Notice Viewed.
 *
 * @return void
 */
function ajax_skeletor_set_admin_notice_viewed()
{
	update_user_meta(get_current_user_id(), '_skeletor_install_notice', 'true');
	die;
}

add_action('wp_ajax_skeletor_set_admin_notice_viewed', 'ajax_skeletor_set_admin_notice_viewed');

if (!did_action('elementor/loaded')) {
	add_action('admin_notices', 'skeletor_fail_load_admin_notice');
}
