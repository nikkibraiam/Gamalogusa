<?php
/**
* This file represents an example of the code that themes would use to register
* the required plugins.
*
* It is expected that theme authors would copy and paste this code into their
* functions.php file, and amend to suit.
*
* @package    TGM-Plugin-Activation
* @subpackage Example
* @version    2.4.1
* @author     Thomas Griffin
* @author     Gary Jones
* @copyright  Copyright (c) 2011, Thomas Griffin
* @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
* @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
*/

require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'finacia_register_required_plugins' );
function finacia_register_required_plugins() {
	$plugins = array(

		// Contact Form 7.
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => true,
		),
		// WooCommerce.
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
		// Redux Framework.
		array(
			'name'     => 'Redux Framework',
			'slug'     => 'redux-framework',
			'required' => true,
		),
		// One Click Demo Import.
		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => true,
		),
		// WPBakery Page Builder
		array(
			'name'     => 'WPBakery Page Builder',
			'slug'     => 'js_composer',
			'required' => true,
			'source' =>'https://api.radiantthemes.com/plugins/@3d!S58hndj-5d5&-fg8/visual-composer--SQeyhuYxqWFubs5iyeWPczR8jE7zU6zen8JpUGZw.zip',
			'version' => '6.1',
			
		),
		// RadiantThemes Custom Post Type
		array(
			'name'     => 'RadiantThemes Custom Post Type',
			'slug'     => 'radiantthemes-custom-post-type',
			'required' => true,
			'source' =>'https://themes.radiantthemes.com/finacia/plugins/radiantthemes-custom-post-type.zip',
			'version' => '1.2.2',
			
		),
		// RadiantThemes Addons
		array(
			'name'     => 'RadiantThemes Addons',
			'slug'     => 'radiantthemes-addons',
			'required' => true,
			'source' =>'https://themes.radiantthemes.com/finacia/plugins/radiantthemes-addons.zip',
			'version' => '1.2.5',
			
		),
		// RadiantThemes Mega Menu
		array(
			'name'     => 'RadiantThemes Mega Menu',
			'slug'     => 'radiantthemes-mega-menu',
			'required' => true,
			'source' =>'https://themes.radiantthemes.com/finacia/plugins/radiantthemes-mega-menu.zip',
			'version' => '1.2.0',
			
		),

	);

	$config = array(
		'id'			=> 'tgmpa',					// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	=> '',						// Default absolute path to bundled plugins.
		'menu'			=> 'tgmpa-install-plugins',	// Menu slug.
		'parent_slug'	=> 'themes.php',			// Parent menu slug.
		'capability'	=> 'edit_theme_options',	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	=> true,					// Show admin notices or not.
		'dismissable'	=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'	=> '',						// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	=> true,					// Automatically activate plugins after installation or not.
		'message'		=> '',						// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
if(function_exists('vc_set_as_theme')) vc_set_as_theme( $disable_updater = true );
