<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class chips_custom_acf_textfield extends \acf_field {
	public $show_in_rest = true;
	private $env;

	public function __construct() {
		$this->name = 'text_plus_formatting';
		$this->label = __( 'Text plus formatting', 'chips-wp-customization' );
		$this->category = 'basic'; // basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		$this->description = __( 'Text field with the ability to format bold, italic, and linked text', 'chips-wp-customization' );
		$this->doc_url = '';
		$this->tutorial_url = '';
		$this->defaults = array(
			'font_size'	=> 14,
		);
		$this->l10n = array(
			'error'	=> __( 'Error! Please enter a higher value', 'chips-wp-customization' ),
		);

		$this->env = array(
			'url'     => site_url( str_replace( ABSPATH, '', __DIR__ ) ), // URL to the acf-text-plus-formatting directory.
			'version' => '1.0', // Replace this with your theme or plugin version constant.
		);

		$this->preview_image = $this->env['url'] . '/assets/images/field-preview-custom.png';

		parent::__construct();
	}

	public function render_field( $field ) {
		$valOut = $field['value'];
		if(strip_tags($valOut) == "" && get_field("media_caption")) {
			$valOut = get_field("media_caption");
		}

		?>
		<input
			type="text"
			class="textplus_acf"
			name="<?php echo esc_attr($field['name']) ?>"
			value="<?php echo esc_attr($valOut) ?>"
		/>
		<?php
	}
}


function chips_wp_media_caption_formatting() {
	acf_add_local_field_group(array(
		'key' => 'group_chips_acf_mediacaption',
		'title' => 'Media Caption Formatting',
		'fields' => array(
			array(
				'key' => 'field_chips_acf_mediacaption',
				'label' => 'Caption with formatting',
				'name' => 'chips_media_caption',
				'type' => 'text_plus_formatting',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '100',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'new_lines' => 'wpautop',
				'rows' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'ef_media',
					'operator' => '==',
					'value' => 'image',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
}