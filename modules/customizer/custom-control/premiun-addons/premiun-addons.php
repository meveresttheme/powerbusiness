<?php
/**
 * Customizer Control: premium-addons.
 *
 * @since 1.0.4
 *
 * @package Power Business WordPress Theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Exit if it get loaded before WP_class Customize_Section class
if ( ! class_exists( 'WP_Customize_Section' ) ) {
	return;
}

class power_business_Premiun_addon extends WP_Customize_Section {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'premium-addons';
	public $url  = '';
	public $id = '';

	/**
	 * JSON.
	 */
	public function json() {
		$json 			= parent::json();
		$json['url'] 	= esc_url( $this->url );
		$json['id'] 	= $this->id;
		return $json;
	}

	/**
	 * Render template
	 *
	 * @access protected
	 */
	protected function render_template() {
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3>
				<a href="{{{ data.url }}}" target="_blank">{{ data.title }}</a>
			</h3>
		</li>
		<?php
	}
}

Power_Business_Customizer::add_custom_control( array(
    'type'     => 'premium-addons',
    'class'    => 'power_business_Premiun_addon',
    'sanitize' =>  false
));