<?php 

if(get_option('chips_wp_custom_custom_login_screen')){
	add_action('login_enqueue_scripts', 'chips_wp_custom_login_screen');
	// replace the login wp logo with the site name
	add_filter('login_headertext', 'chips_wp_custom_login_headertext');
}
function chips_wp_custom_login_screen() {
	add_action('login_head', 'chips_wp_custom_login_screen_css');
}
function chips_wp_custom_login_screen_css() {
	echo '<style type="text/css">
	body {
		background:#FFF;
	}
	#login {
		width:100%;
		max-width:500px;
	}
	.login form {
		border:solid 1px #dadada;
		box-shadow:0 0 20px rgba(0,0,0,0.1);
	}
	.login h1 a {
		background-image: none;
		padding-bottom: 0;
		width:auto;
		height:auto;
		text-indent:0;
		text-transform:uppercase;
		letter-spacing:0.08em;
	}
	.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
		color:#000;
	}
	.wp-core-ui .button-primary {
		background:#000;
		border-color:#000;
		box-shadow:none;
		text-shadow:none;
	}
	';
	if(get_option('chips_wp_custom_login_css')){
		echo get_option('chips_wp_custom_login_css');
	}
	echo '
	</style>';
}
function chips_wp_custom_login_headertext() {
	return get_bloginfo('name');
}