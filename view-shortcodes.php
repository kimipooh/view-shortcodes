<?php
/*
Plugin Name: View Shortcodes
Plugin URI: 
Description: The plugin is for displaying active shortcodes.
Version: 1.6.0
Author: Kimiya Kitani
Author URI: https://profiles.wordpress.org/kimipooh/
Text Domain: view-shortcodes
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_menu', 'add_to_view_shortocodes_settings_menu' );

// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- Existing callback name retained for backward compatibility.
function add_to_view_shortocodes_settings_menu() {
	// Add Main Menu, permitted by "edit_posts".
	add_menu_page(
		__( 'Active Shortcodes', 'view-shortcodes' ),
		__( 'Shortcodes', 'view-shortcodes' ),
		'edit_posts',
		'view-shortcodes',
		'view_shortcodes_admin_settings_page'
	);
}

function view_shortcodes_admin_settings_page() {
	global $shortcode_tags;
	$line_max = 4;

	?>
	<div id="view_shortcodes_title">
		<h2><?php esc_html_e( 'View Shortcodes', 'view-shortcodes' ); ?></h2>

		<fieldset style="border:1px solid #777777; width: 750px; padding-left: 6px;">
			<legend><h3><?php esc_html_e( 'Active Shortcodes', 'view-shortcodes' ); ?></h3></legend>
			<div style="overflow:scroll; height: 500px;">
			<table>
	<?php
	$tags_names = array();
	foreach ( $shortcode_tags as $name => $value ) {
		$tags_names[] = $name;
	}
	sort( $tags_names );

	$i_max = count( $tags_names );
	for ( $i = 0; $i < $i_max; $i++ ) {
		echo '<tr><td><input type="text" value="[' . esc_attr( $tags_names[ $i ] ) . ']" /></td>';
		for ( $j = 0; $j < $line_max - 1; $j++ ) {
			if ( isset( $tags_names[ ++$i ] ) ) {
				echo '<td><input type="text" value="[' . esc_attr( $tags_names[ $i ] ) . ']"/></td>';
			} else {
				break;
			}
		}
		echo '</tr>' . "\n";
	}
	echo '</tr>' . "\n";
	?>
			</table>
			</div>
		</fieldset>

	</div>
	<?php
}
