<?php
/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Fonts extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fonts';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Elementor Test Fonts', 'elementor-test' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'elementor-test-cat' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'elementor', 'icons', 'icon', 'photo' ];
	}

	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Elementor Test Widgets', 'elementor-test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'font',
			[
				'label' => esc_html__( 'Text Font', 'elementor-test' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'label_block' => true,
                'selectors' => [
                    '{{WRAPPER}} p' => 'font-family:{{VALUE}}'
                ]
            ]
		);

        $this->add_control(
			'fonttwo',
			[
				'label' => esc_html__( 'Text Font Two', 'elementor-test' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'label_block' => true,
                'selectors' => [
                    '{{WRAPPER}} p.paratwo' => 'font-family:{{VALUE}}'
                ]
            ]
		);

		$this->end_controls_section();

	}

	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        
        ?>
            <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae qui amet sunt debitis laborum vel, vitae distinctio aliquid quaerat obcaecati a soluta, incidunt laudantium repellat, animi velit est possimus!</p>
            <p class="paratwo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae qui amet sunt debitis laborum vel, vitae distinctio aliquid quaerat obcaecati a soluta, incidunt laudantium repellat, animi velit est possimus!</p>
        <?php
	}

	/**
	 * Render list widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>
            <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae qui amet sunt debitis laborum vel, vitae distinctio aliquid quaerat obcaecati a soluta, incidunt laudantium repellat, animi velit est possimus!</p>
            <p class="paratwo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae qui amet sunt debitis laborum vel, vitae distinctio aliquid quaerat obcaecati a soluta, incidunt laudantium repellat, animi velit est possimus!</p>
		<?php
	}

}
