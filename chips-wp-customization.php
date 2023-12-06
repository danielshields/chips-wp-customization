<?php
/*
Plugin Name: CHIPS Wordpress Customization
Description: A plugin for common CHIPS Wordpress customizations
Version: 1.0
Author: Dan Shields
*/



/* SETTINGS PAGE DEFINITION */
function chips_wp_custom_settings() {
	add_options_page('CHIPS Wordpress Customizations', 'CHIPS Wordpress Customizations', 'manage_options', 'chips_wp_overrides', 'ciu_settings_page');
}
add_action('admin_menu', 'chips_wp_custom_settings');

function ciu_settings_page() {
	if (!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions to access this page.');
	}
    ?>
	<style>
		.chips_wp_custom_settings_wrap fieldset {
			padding:0.5em;
			background:white;
			margin:0 3em 1em 0;
			display:flex;
			justify-content: flex-start;
			align-items: center;
		}
		.chips_wp_custom_settings_wrap fieldset label {
			margin-right:1em;
			min-width:240px;
			text-align: left;
			flex-shrink: 0;
		}
		.chips_wp_custom_settings_wrap fieldset textarea {
			width:100%;
			min-height:100px;
		}
		.settings-save {
			padding:1em 2em;
			background:white;
			border:solid 1px black;
			cursor:pointer;
			border-radius:4px;
		}
	</style>
	
    <div class="chips_wp_custom_settings_wrap">
    <h2>CHIPS WP Customizations</h2>

	<form action="<?php 
		echo esc_url(admin_url('admin-post.php'));
	?>" method="post">
		<fieldset>
			<label for="chips_wp_custom_remove_emojis">Remove Emojis</label>
			<input type="checkbox" name="chips_wp_custom_remove_emojis" id="chips_wp_custom_remove_emojis" value="1" <?php echo (get_option('chips_wp_custom_remove_emojis') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_remove_wp_version">Remove WP Version</label>
			<input type="checkbox" name="chips_wp_custom_remove_wp_version" id="chips_wp_custom_remove_wp_version" value="1" <?php echo (get_option('chips_wp_custom_remove_wp_version') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_remove_legacy_block_styles">Remove Legacy Block Styles</label>
			<input type="checkbox" name="chips_wp_custom_remove_legacy_block_styles" id="chips_wp_custom_remove_legacy_block_styles" value="1" <?php echo (get_option('chips_wp_custom_remove_legacy_block_styles') == 1 ? 'checked' : ''); ?> />
		</fieldset>		
		<fieldset>
			<label for="chips_wp_custom_remove_rss">Remove RSS, XML-RPC, wp_oembed</label>
			<input type="checkbox" name="chips_wp_custom_remove_rss" id="chips_wp_custom_remove_rss" value="1" <?php echo (get_option('chips_wp_custom_remove_rss') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_remove_comments">Remove Comments</label>
			<input type="checkbox" name="chips_wp_custom_remove_comments" id="chips_wp_custom_remove_comments" value="1" <?php echo (get_option('chips_wp_custom_remove_comments') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		
		<fieldset>
			<label for="chips_wp_custom_remove_add_media">Remove Add Media Button</label>
			<input type="checkbox" name="chips_wp_custom_remove_add_media" id="chips_wp_custom_remove_add_media" value="1" <?php echo (get_option('chips_wp_custom_remove_add_media') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_move_scripts_to_footer">Move Scripts to Footer</label>
			<input type="checkbox" name="chips_wp_custom_move_scripts_to_footer" id="chips_wp_custom_move_scripts_to_footer" value="1" <?php echo (get_option('chips_wp_custom_move_scripts_to_footer') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
		<label for="chips_wp_custom_custom_login_screen">Customize login page</label>
			<input type="checkbox" name="chips_wp_custom_custom_login_screen" id="chips_wp_custom_custom_login_screen" value="1" <?php echo (get_option('chips_wp_custom_custom_login_screen') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_login_css">
				Custom Login CSS
			</label>
			<textarea name="chips_wp_custom_login_css" id="chips_wp_custom_login_css"><?php echo get_option('chips_wp_custom_login_css'); ?></textarea>
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_hide_imgs_from_search">Exclude images from search</label>
			<input type="checkbox" name="chips_wp_custom_hide_imgs_from_search" id="chips_wp_custom_hide_imgs_from_search" value="1" <?php echo (get_option('chips_wp_custom_hide_imgs_from_search') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_disable_authors">Disable author & date pages</label>
			<input type="checkbox" name="chips_wp_custom_disable_authors" id="chips_wp_custom_disable_authors" value="1" <?php echo (get_option('chips_wp_custom_disable_authors') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_wrap_vids">Wrap videos in <code>.inline-vid-wrap</code></label>
			<input type="checkbox" name="chips_wp_custom_wrap_vids" id="chips_wp_custom_wrap_vids" value="1" <?php echo (get_option('chips_wp_custom_wrap_vids') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_remove_howdy">Remove "Howdy"</label>
			<input type="checkbox" name="chips_wp_custom_remove_howdy" id="chips_wp_custom_remove_howdy" value="1" <?php echo (get_option('chips_wp_custom_remove_howdy') == 1 ? 'checked' : ''); ?> />
		</fieldset>
		<fieldset>
			<label for="chips_wp_custom_rte_formats">
				Custom RTE Formats
				<br><br>
				<small>
					Format: Title|class|selector|block/inline|wrap<br>
					Jumbo|jumbo||block|wrap<br>
					Button with arrow|button-w-arrow|a|inline
				</small>
			</label>
			<textarea name="chips_wp_custom_rte_formats" id="chips_wp_custom_rte_formats"><?php echo get_option('chips_wp_custom_rte_formats'); ?></textarea>
		</fieldset>
		<input class="settings-save" type="submit" name="submit" value="Save Changes" />
	</form>

	<?php 
}


/* SETTINGS PAGE HANDLER */
add_action('admin_post', 'chips_wp_custom_settings_handler');
function chips_wp_custom_settings_handler() {
	if (!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions to access this page.');
	}
	if (isset($_POST['chips_wp_custom_remove_emojis'])) {
		update_option('chips_wp_custom_remove_emojis', $_POST['chips_wp_custom_remove_emojis']);
	} else {
		update_option('chips_wp_custom_remove_emojis', 0);
	}
	if (isset($_POST['chips_wp_custom_remove_wp_version'])) {
		update_option('chips_wp_custom_remove_wp_version', $_POST['chips_wp_custom_remove_wp_version']);
	} else {
		update_option('chips_wp_custom_remove_wp_version', 0);
	}
	if (isset($_POST['chips_wp_custom_remove_rss'])) {
		update_option('chips_wp_custom_remove_rss', $_POST['chips_wp_custom_remove_rss']);
	} else {
		update_option('chips_wp_custom_remove_rss', 0);
	}
	if (isset($_POST['chips_wp_custom_remove_comments'])) {
		update_option('chips_wp_custom_remove_comments', $_POST['chips_wp_custom_remove_comments']);
	} else {
		update_option('chips_wp_custom_remove_comments', 0);
	}
	
	if (isset($_POST['chips_wp_custom_remove_add_media'])) {
		update_option('chips_wp_custom_remove_add_media', $_POST['chips_wp_custom_remove_add_media']);
	} else {
		update_option('chips_wp_custom_remove_add_media', 0);
	}
	if (isset($_POST['chips_wp_custom_move_scripts_to_footer'])) {
		update_option('chips_wp_custom_move_scripts_to_footer', $_POST['chips_wp_custom_move_scripts_to_footer']);
	} else {
		update_option('chips_wp_custom_move_scripts_to_footer', 0);
	}
	if (isset($_POST['chips_wp_custom_custom_login_screen'])) {
		update_option('chips_wp_custom_custom_login_screen', $_POST['chips_wp_custom_custom_login_screen']);
	} else {
		update_option('chips_wp_custom_custom_login_screen', 0);
	}

	if(isset($_POST['chips_wp_custom_remove_legacy_block_styles'])) {
		update_option('chips_wp_custom_remove_legacy_block_styles', $_POST['chips_wp_custom_remove_legacy_block_styles']);
	} else {
		update_option('chips_wp_custom_remove_legacy_block_styles', 0);
	}
	if(isset($_POST['chips_wp_custom_rte_formats'])) {
		update_option('chips_wp_custom_rte_formats', $_POST['chips_wp_custom_rte_formats']);
	}
	if(isset($_POST['chips_wp_custom_login_css'])) {
		update_option('chips_wp_custom_login_css', $_POST['chips_wp_custom_login_css']);
	}
	if(isset($_POST['chips_wp_custom_hide_imgs_from_search'])) {
		update_option('chips_wp_custom_hide_imgs_from_search', $_POST['chips_wp_custom_hide_imgs_from_search']);
	} else {
		update_option('chips_wp_custom_hide_imgs_from_search', 0);
	}
	if(isset($_POST['chips_wp_custom_disable_authors'])) {
		update_option('chips_wp_custom_disable_authors', $_POST['chips_wp_custom_disable_authors']);
	} else {
		update_option('chips_wp_custom_disable_authors', 0);
	}
	if(isset($_POST['chips_wp_custom_wrap_vids'])) {
		update_option('chips_wp_custom_wrap_vids', $_POST['chips_wp_custom_wrap_vids']);
	} else {
		update_option('chips_wp_custom_wrap_vids', 0);
	}
	
	if(isset($_POST['chips_wp_custom_remove_howdy'])) {
		update_option('chips_wp_custom_remove_howdy', $_POST['chips_wp_custom_remove_howdy']);
	} else {
		update_option('chips_wp_custom_remove_howdy', 0);
	}

	wp_redirect($_SERVER['HTTP_REFERER']);
	exit;
}


if (get_option('chips_wp_custom_remove_emojis') == 1) {
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
}
if (get_option('chips_wp_custom_remove_wp_version') == 1) {
	remove_action('wp_head', 'wp_generator');
}
if (get_option('chips_wp_custom_remove_rss') == 1) {
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);

	add_filter('xmlrpc_enabled', '__return_false');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');

	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
	remove_action('wp_head', 'rest_output_link_wp_head');
	remove_action('wp_head', 'wp_shortlink_wp_head');
}

if(get_option('chips_wp_custom_remove_comments')){
	add_filter('feed_links_show_comments_feed', '__return_false');
	// hide Comments from the sidebar
	add_action('admin_menu', 'chips_wp_custom_remove_comments_menu');
	add_action('wp_before_admin_bar_render', 'chips_wp_custom_remove_comments_admin_bar');
}
function chips_wp_custom_remove_comments_menu() {
	remove_menu_page('edit-comments.php');
}
function chips_wp_custom_remove_comments_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}


if(get_option('chips_wp_custom_remove_add_media')){
	add_action('admin_menu', 'chips_wp_custom_remove_add_media');
}
function chips_wp_custom_remove_add_media() {
	remove_action('media_buttons', 'media_buttons');
}

if(get_option('chips_wp_custom_move_scripts_to_footer')){
	add_action('wp_enqueue_scripts', 'chips_wp_custom_move_scripts_to_footer');
}
function chips_wp_custom_move_scripts_to_footer() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
}

require_once('components/_rte.php');
require_once('components/_login.php');

if(get_option('chips_wp_custom_hide_imgs_from_search')){
	add_action('init', 'chips_wp_custom_hide_imgs_from_search');
}
function chips_wp_custom_hide_imgs_from_search() {
	global $wp_post_types;
	$wp_post_types['attachment']->exclude_from_search = true;
}

if(get_option('chips_wp_custom_disable_authors')){
	add_action('template_redirect', 'chips_wp_custom_disable_authors');
}
function chips_wp_custom_disable_authors(){
	if (is_author() || is_date()) {
		global $wp_query;
		$wp_query->set_404();
	}
}


if(get_option('chips_wp_custom_wrap_vids')){
	add_filter('the_content', 'chips_wp_custom_inline_vid_wrap');
}
function chips_wp_custom_inline_vid_wrap($content) {
	$pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
	preg_match_all($pattern, $content, $matches);

	foreach ($matches[0] as $match) {
		$wrappedframe = '<div class="inline-vid-wrap">' . $match . '</div>';
		$content = str_replace($match, $wrappedframe, $content);
	}

	return $content;
}

function chips_wp_custom_admin_additions(){
	echo '<style>
		[data-toolbar="very_simple"] iframe { height:auto !important; min-height:150px !important; }
	</style>';
}
add_action('admin_head', 'chips_wp_custom_admin_additions');

if(get_option('chips_wp_custom_remove_howdy')){
	add_filter('gettext', 'change_howdy', 10, 3);
}
function change_howdy($translated, $text, $domain){
	if (!is_admin() || 'default' != $domain)
		return $translated;

	if (false !== strpos($translated, 'Howdy'))
		return str_replace('Howdy, ', '', $translated);

	return $translated;
}

if (get_option('chips_wp_custom_remove_legacy_block_styles') == 1) {
	add_action('wp_enqueue_scripts', 'chips_wp_custom_deregister_styles', 100);
}

function chips_wp_custom_deregister_styles() {
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}
