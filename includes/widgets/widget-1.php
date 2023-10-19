<?php
/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Widget_1 extends \Elementor\Widget_Base {

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
		return 'test_widgets';
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
		return esc_html__( 'Elementor Test Widget', 'elementor-test' );
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
		return 'eicon-bullet-list';
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
		return [ 'general','elementor-test-cat' ];
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
		return [ 'elementor', 'test', 'category', 'unordered' ];
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
			'heading',
			[
				'label'	=> esc_html__('Somthing Text', 'elementor-test'),
				'type'	=> \Elementor\Controls_Manager::TEXT,
				'default'	=> "Something Text",
			]
		);

		$this->add_control(
			'description',
			[
				'label'	=> esc_html__('Description', 'elementor-test'),
				'type'	=> \Elementor\Controls_Manager::TEXTAREA,
				'default'	=> "lorem ispsam text here",
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_alintment_header',
			[
				'label' => esc_html__( 'Text Alientment', 'elementor-test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text_alintment',
			[
				'label'	=> esc_html__('Alientment', 'elementor-test'),
				'type'	=> \Elementor\Controls_Manager::SELECT,
				'default'	=> "center",
				'options'	=> [
					'left'		=> esc_html('Left', 'elementor-test'),
					'right'		=> esc_html('Right', 'elementor-test'),
					'center'		=> esc_html('Center', 'elementor-test'),
				],
				'selectors'	=> [
					'{{WRAPPER}} h2' => 'text-align:{{VALUE}}',
				],
			]
		);

		$this->add_control(
			'description_alintment',
			[
				'label'	=> esc_html__('Alientment', 'elementor-test'),
				'type'	=> \Elementor\Controls_Manager::SELECT,
				'default'	=> "center",
				'options'	=> [
					'left'		=> esc_html('Left', 'elementor-test'),
					'right'		=> esc_html('Right', 'elementor-test'),
					'center'		=> esc_html('Center', 'elementor-test'),
				],
				'selectors'	=> [
					'{{WRAPPER}} p' => 'text-align:{{VALUE}}',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'color',
			[
				'label' => esc_html__( 'Color', 'elementor-test' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'header_color',
			[
				'label'	=> esc_html__('Heading Color', 'elementor-test'),
				'type'	=> \Elementor\Controls_Manager::COLOR,
				'default'	=> "#000",
				'selectors'	=> [
					'{{WRAPPER}} h2' => 'color:{{VALUE}}',
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'	=> esc_html__('Description Color', 'elementor-test'),
				'type'	=> \Elementor\Controls_Manager::COLOR,
				'default'	=> "red",
				'selectors'	=> [
					'{{WRAPPER}} p' => 'color:{{VALUE}}',
				],
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
		$heading = $settings['heading'];
		$description = $settings['description'];

		$this->add_inline_editing_attributes('heading', 'basic');
		$this->add_render_attribute(
			'heading',
			[
				'class' => [ 'heading', $heading ],
			]
		);
		?>
		
		<h2 <?php echo $this->get_render_attribute_string('heading') ?>><?php echo esc_html($heading) ; ?></h2>
		<p><?php echo esc_html($description) ; ?></p>

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
			<#
				view.addInlineEditingAttributes('heading', 'basic');
				view.addRenderAttribute(
				'heading',
					{
						'class': [ 'heading', settings.heading ],
					}
				);
			#>
			<h2 {{{view.getRenderAttributeString('heading')}}}>{{{settings.heading}}}</h2>
			<p>
				{{{settings.description}}}
			</p>
		<?php
	}

}
