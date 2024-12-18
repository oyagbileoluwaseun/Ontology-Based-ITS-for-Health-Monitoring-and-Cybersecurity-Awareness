<?php
defined( 'ABSPATH' ) || die();

use Elementor\Controls_Stack;
use Elementor\Plugin;
use Elementor\Utils;

if ( ! class_exists( 'Xcare_Template_Kits' ) ) {

	/**
	 * Xcare_Template_Kits class.
	 *
	 * @since 1.0.0
	 */
	class Xcare_Template_Kits {

		/**
		 * Xcare_Template_Kits instance.
		 * @access private
		 * @var Xcare_Template_Kits
		 */
		private static $instance;

		/**
		 * Xcare_Template_Kits version.
		 * @access private
		 * @var string
		 */
		private static $version = '1.0.0';

		private static $xcare_template_kits_title	   = 'Xcare Template Kits';
		private static $xcare_template_kits_id		  = 'xcare_template_kits';
		private static $xcare_template_kits_slug		= 'xcare-template-kits';
		private static $xcare_template_kits_popup_title = 'Xcare Template Kits';

		/**
		 * Xcare_Template_Kits directory.
		 * @access private
		 * @var string
		 */
		private static $xcare_template_kits_dir;

		/**
		 * Xcare_Template_Kits URL.
		 * @access private
		 * @var string
		 */
		private static $xcare_template_kits_url;

		/**
		 * Xcare_Template_Kits templates directory.
		 * @access private
		 * @var string
		 */
		private static $xcare_template_kits_templates_dir;

		/**
		 * Xcare_Template_Kits templates URL.
		 * @access private
		 * @var string
		 */
		private static $xcare_template_kits_templates_url;

		/**
		 * Utils instance.
		 * @var Xcare_Template_Kits_Utils
		 */
		public $utils = null;

		/**
		 * Constants.
		 * @access public
		 * @var array
		 */
		public $constants = array();

		/**
		 * Arguments.
		 * @access private
		 * @var array
		 */
		private static $args = array();

		/**
		 * Constructor.
		 */
		public function __construct( $args ) {
			self::$args = $args;
			$this->define_constants();
			$this->init_hooks();
			add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'editor_enqueue_styles' ], 0 );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'editor_enqueue_scripts' ], 0 );
		}

		/**
		 * Defines constants used by the plugin.
		 */
		private function define_constants() {
			$defaults = array(
				'xcare_template_kits_title'		 => esc_html__( 'Xcare Template Kits', 'xcare' ),
				'xcare_template_kits_id'			=> 'xcare_template_kits',
				'xcare_template_kits_slug'		  => 'xcare-template-kits',
				'xcare_template_kits_dir'		   => wp_normalize_path( dirname( __FILE__ ) ),
				'xcare_template_kits_url'		   => str_replace( wp_normalize_path( untrailingslashit( get_template_directory() ) ), get_template_directory_uri(), wp_normalize_path( dirname( __FILE__ ) ) ),
				'xcare_template_kits_templates_dir' => trailingslashit( wp_normalize_path( dirname( __FILE__ ) ) ) . 'templates',
				'xcare_template_kits_templates_url' => str_replace( wp_normalize_path( untrailingslashit( get_template_directory() ) ), get_template_directory_uri(), trailingslashit( wp_normalize_path( dirname( __FILE__ ) ) ) . 'templates' ),
			);

			$this->constants = wp_parse_args( self::$args, $defaults );

			self::$xcare_template_kits_title		 = $this->constants['xcare_template_kits_title'];
			self::$xcare_template_kits_popup_title   = ( isset( $this->constants['xcare_template_kits_popup_title'] ) && ! empty( $this->constants['xcare_template_kits_popup_title'] ) ) ? $this->constants['xcare_template_kits_popup_title'] : $this->constants['xcare_template_kits_title'];
			self::$xcare_template_kits_id			= $this->constants['xcare_template_kits_id'];
			self::$xcare_template_kits_slug		  = $this->constants['xcare_template_kits_slug'];
			self::$xcare_template_kits_dir		   = $this->constants['xcare_template_kits_dir'];
			self::$xcare_template_kits_url		   = $this->constants['xcare_template_kits_url'];
			self::$xcare_template_kits_templates_dir = $this->constants['xcare_template_kits_templates_dir'];
			self::$xcare_template_kits_templates_url = $this->constants['xcare_template_kits_templates_url'];

		}

		/**
		 * Initializes the plugin.
		 */
		private function init_hooks() {

			if ( ! class_exists( '\Elementor\Plugin' ) ) {
				return;
			}

			// Hook actions.
			$this->add_actions();

			/**
			 * Fires after all files have been loaded.
			 * @param Xcare_Template_Kits
			 */
			do_action( 'xcare_template_kits_init', $this );
		}

		/**
		 * Adds required action hooks.
		 * @access protected
		 */
		protected function add_actions() {

			// Editor Assets
			add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'editor_enqueue_styles' ], 0 );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'editor_enqueue_scripts' ], 0 );

			// Front Assets
			add_action( 'elementor/preview/enqueue_styles', [ $this, 'preview_enqueue_styles' ] );

			add_action( 'wp_ajax_xcare_template_kits_sync_library', [ $this, 'sync_library' ] );
			add_action( 'wp_ajax_xcare_template_kits_get_template', [ $this, 'get_template' ] );
			add_action( 'elementor/editor/footer', [ $this, 'editor_templates' ] );

		}

		/**
		 * Returns the version number of the plugin.
		 * @return string
		 */
		public function version() {
			return self::$version;
		}

		/**
		 * Returns the plugin directory.
		 * @return string
		 */
		public static function get_dir() {
			return self::$xcare_template_kits_dir;
		}

		/**
		 * Returns the plugin URL.
		 * @return string
		 */
		public function get_url() {
			return self::$xcare_template_kits_url;
		}

		/**
		 * Enqueue styles.
		 * Enqueue all the editor styles.
		 * Fires after Elementor editor styles are enqueued.
		 * @access public
		 */
		public function editor_enqueue_styles() {
			$suffix = \Elementor\Utils::is_script_debug() ? '' : '.min';

			wp_enqueue_style(
				self::$xcare_template_kits_slug . '-editor',
				trailingslashit( self::$xcare_template_kits_url ) . 'assets/css/editor.css',
				array(),
				self::$version
			);
			wp_enqueue_style(
				self::$xcare_template_kits_slug . '-pbm-editor',
				trailingslashit( self::$xcare_template_kits_url ) . 'assets/css/preview.css',
				array(),
				self::$version
			);
		}

		/**
		 * Enqueue scripts.
		 * Enqueue all the editor scripts.
		 * Fires after Elementor editor scripts are enqueued.
		 * @access public
		 */
		public function editor_enqueue_scripts() {
			$suffix   = \Elementor\Utils::is_script_debug() ? '' : '.min';
			$all_data = pbmit_get_all_option_array();


			$templates_directory_path = $this->get_templates_dir();
			$templates_directory_url  = $this->get_templates_url();
			$handler				  = opendir( $templates_directory_path );
			$categories			   = array();

			while ( $handler && false !== ( $directory_name = readdir( $handler ) ) ) {
				// Check if we have a val;id directory.
				$template_dir = trailingslashit( $templates_directory_path ) . $directory_name;
				if ( is_dir( $template_dir ) ) {
					if ( file_exists( $template_dir . DIRECTORY_SEPARATOR . 'element-config.php' ) ) {
						$template_data = require_once( $template_dir . DIRECTORY_SEPARATOR . 'element-config.php' );
						if (
							! isset( $template_data['title'] )
							|| ! isset( $template_data['type'] )
							|| ! isset( $template_data['category'] )
						) {
							continue;
						}
						
						// Process Categories
						$template_categories = array();
						foreach ( (array) $template_data['category'] as $template_category ) {
							$template_categories[ sanitize_title_with_dashes( $template_category ) ] = $template_category;
						}
						$template_data['category'] = $template_categories;
						$categories = array_merge( $categories, $template_data['category'] );
						
					}
				}
			}
			
			// order			
			if( !empty( $categories ) ){
				$categories2 = array();
				if( !empty($categories['sections']) ){
					$categories2[ 'sections' ] = $categories['sections'];
				}
				if( !empty( $categories['pages'] ) ){
					$categories2[ 'pages' ] = $categories['pages'];
				}
				foreach( $categories as $cat_k=>$cat_v ){
					if( $cat_k != 'sections' && $cat_k != 'pages' ){
						$categories2[ $cat_k ] = $cat_v;
					}
				}
				$categories = $categories2;
			}

			wp_enqueue_script(
				self::$xcare_template_kits_slug . '-editor',
				trailingslashit( self::$xcare_template_kits_url ) . 'assets/js/editor.js',
				array( 'jquery', 'wp-i18n' ),
				self::$version,
				true
			);

			wp_set_script_translations(
				self::$xcare_template_kits_slug . '-editor',
				apply_filters( 'xcare_template_kits_script_translations_domain', 'xcare', self::$xcare_template_kits_id ),
				apply_filters( 'xcare_template_kits_script_translations_path', get_parent_theme_file_path( '/languages' ), self::$xcare_template_kits_id )
			);

			wp_localize_script(
				self::$xcare_template_kits_slug . '-editor',
				'xcare_template_kits_data',
				array(
					'obj_name' => self::$xcare_template_kits_id,
				)
			);
			wp_localize_script(
				self::$xcare_template_kits_slug . '-editor',
				self::$xcare_template_kits_id,
				apply_filters(
					self::$xcare_template_kits_slug . '-editor',
					array(
						'ajax_url'					  => admin_url( 'admin-ajax.php' ),
						'ajax_nonce'					=> wp_create_nonce( 'xcare_template_kits_nonce' ),
						'xcare_template_kits_slug'			  => self::$xcare_template_kits_slug,
						'xcare_template_kits_categories'		=> $categories,
						'xcare_template_kits_id'				=> self::$xcare_template_kits_id,
						'xcare_template_kits_btn_title'		 => esc_html__( 'Add Xcare Templates', 'xcare' ),
						'xcare_template_kits_btn_class'		 => self::$xcare_template_kits_slug . '-add-template-button',
						'xcare_template_kits_btn_logo'		  => trailingslashit( self::$xcare_template_kits_url ) . 'assets/img/studio-icon.png',
						'xcare_template_kits_mdl_icon'		  => trailingslashit( self::$xcare_template_kits_url ) . 'assets/img/studio-icon.png',
						/*
						This is for reference only: (you can use variable too)
						//'xcare_template_kits_mdl_icon_bg_color' => $all_data['global_color'],
						*/
						'xcare_template_kits_mdl_icon_bg_color' => '#76ba43',
						'xcare_template_kits_mdl_title'		 => self::$xcare_template_kits_popup_title,
						'translations'				  => array(
							'submit_n_deactivate' => esc_html__( 'Submit & Deactivate', 'xcare' ),
							'skip_n_deactivate'   => esc_html__( 'Skip & Deactivate', 'xcare' ),
							'library_fetch_error' => esc_html__( 'Unable to fetch templates from the server.', 'xcare' ),
							'library_sync_error'  => esc_html__( 'Unable to sync templates from the server.', 'xcare' ),
						),
					),
					self::$xcare_template_kits_slug
				)
			);
		}

		/**
		 * Enqueue preview styles.
		 * Enqueue all the preview styles.
		 * @access public
		 */
		public function preview_enqueue_styles() {
			$suffix = \Elementor\Utils::is_script_debug() ? '' : '.min';

			wp_enqueue_style(
				self::$xcare_template_kits_slug . '-preview',
				trailingslashit( self::$xcare_template_kits_url ) . 'assets/css/preview.css',
				array(),
				self::$version
			);
		}

		/**
		 * Sync library.
		 * @access public
		 * @return void
		 */
		public function sync_library() {
			if ( ! check_ajax_referer( 'xcare_template_kits_nonce', 'security', false ) ) {
				wp_send_json_error( esc_html__( 'Unable to verify security.', 'xcare' ), 403 );
			}

			$templates = $this->get_templates();

			if ( empty( $templates ) ) {
				wp_send_json_error( esc_html__( 'No templates found.', 'xcare' ) );
			}

			wp_send_json_success( $templates );
		}

		/**
		 * Loads all PHP files in a given directory.
		 *
		 * @param string $directory_name The directory name to load the files.
		 */
		public static function load_directory( $directory_name, $args = array() ) {
			$path	   = trailingslashit( trailingslashit( self::get_dir() ) . '/' . $directory_name );
			$file_names = glob( $path . '*.php' );
			foreach ( $file_names as $filename ) {
				if ( file_exists( $filename ) ) {
					require_once $filename;
				}
			}
		}

		/**
		 * Loads specified PHP files from the plugin includes directory.
		 * @param array $file_names The names of the files to be loaded in the includes directory.
		 */
		public static function load_files( $file_names = [] ) {
			foreach ( $file_names as $file_name ) {
				$path = trailingslashit( self::get_dir() ) . $file_name;

				if ( file_exists( $path ) ) {
					require_once $path;
				}
			}
		}

		/**
		 * Sync library.
		 * @access public
		 * @return void
		 */
		public function get_template() {
			if ( ! check_ajax_referer( 'xcare_template_kits_nonce', 'security', false ) ) {
				wp_send_json_error( esc_html__( 'Unable to verify security.', 'xcare' ), 403 );
			}

			$template_id		 = sanitize_text_field( wp_unslash( $_POST['template_id'] ) );
			$editor_post_id	  = sanitize_text_field( wp_unslash( $_POST['editor_post_id'] ) );
			$templates_directory = $this->get_templates_dir();
			$template_dir		= trailingslashit( $templates_directory ) . $template_id;
			$template_file	   = trailingslashit( $template_dir ) . 'element-template.json';

			if ( ! is_dir( $template_dir ) || ! file_exists( $template_file ) ) {
				wp_send_json_error( esc_html__( 'Template not found.', 'xcare' ) );
			}

			ob_start();
			include_once( $template_file );
			$json_data = ob_get_contents();
			ob_end_clean();

			try {
				$template_data = json_decode( $json_data, true );
			} catch ( Exception $e ) {
				wp_send_json_error( esc_html__( 'Template data file is invalid.', 'xcare' ) );
			}

			if ( ! $template_data ) {
				wp_send_json_error( esc_html__( 'Template data is broken.', 'xcare' ) );
			}

			$template_data['content'] = $this->replace_elements_ids( $template_data['content'] );
			$template_data['content'] = $this->process_export_import_content( $template_data['content'], 'on_import' );

			$document = Plugin::$instance->documents->get( $editor_post_id );
			if ( $document ) {
				$template_data['content'] = $document->get_elements_raw_data( $template_data['content'], true );
			}
			wp_send_json_success( $template_data );
		}

		/**
		 * Get templates.
		 * @param array $args Optional.
		 * @return array.
		 */
		public function get_templates( $args = array() ) {
			$data	   = array();
			$templates  = array();
			$categories = array();
			$tags	   = array();

			// Read Local Directory
			$templates_directory_path = $this->get_templates_dir();
			$templates_directory_url  = $this->get_templates_url();
			$handler				  = opendir( $templates_directory_path );

			while ( $handler && false !== ( $directory_name = readdir( $handler ) ) ) {

				// Check if we have a val;id directory.
				$template_dir = trailingslashit( $templates_directory_path ) . $directory_name;
				if ( ! is_dir( $template_dir ) ) {
					continue;
				}

				// Make sure we have mandatory files.
				$mandatory_files_missing = false;
				foreach ( array( 'element-thumbnail.jpg', 'element-config.php', 'element-template.json' ) as $file ) {
					if ( ! file_exists( $template_dir . DIRECTORY_SEPARATOR . $file ) ) {
						$mandatory_files_missing = true;
						break;
					}
				}

				// Skip if mandatory files not found.
				if ( $mandatory_files_missing ) {
					continue;
				}

				$template_dir_url = trailingslashit( $templates_directory_url ) . $directory_name;
				$template_id	  = sanitize_title_with_dashes( $directory_name );
				$template_data	= require_once( $template_dir . DIRECTORY_SEPARATOR . 'element-config.php' );

				if (
					! isset( $template_data['title'] )
					|| ! isset( $template_data['type'] )
					|| ! isset( $template_data['category'] )
				) {
					continue;
				}

				// Process Categories
				$template_categories = array();
				foreach ( (array) $template_data['category'] as $template_category ) {
					$template_categories[ sanitize_title_with_dashes( $template_category ) ] = $template_category;
				}
				$template_data['category'] = $template_categories;
				$categories = array_merge( $categories, $template_data['category'] );

				// Process Tags
				$template_tags = array();
				foreach ( (array) $template_data['tags'] as $template_tag ) {
					$template_tags[ sanitize_title_with_dashes( $template_tag ) ] = $template_tag;
				}
				$template_data['tags'] = $template_tags;
				$tags = array_merge( $tags, $template_data['tags'] );

				$args = array(
					'template_id' => $template_id,
					'thumbnail'   => trailingslashit( $template_dir_url ) . 'element-thumbnail.jpg',
				);

				$templates[ $template_id ] = $this->prepare_template( $args, $template_data );
			}

			if ( ! empty( $templates ) ) {
				ksort( $categories );
				$categories = array_merge(
					array(
						'all' => esc_html__( 'All', 'xcare' ),
					),
					$categories
				);
				$data['categories'] = $categories;
				$data['tags']	   = $tags;
				$data['templates']  = $templates;
			}

			return $data;
		}

		/**
		 * @access private
		 */
		private function prepare_template( $args, array $template_data ) {
			if ( empty( $args['preview'] ) ){
				$args['preview'] = '';
			}
			return array(
				'template_id'	 => $args['template_id'],
				'title'		   => $template_data['title'],
				'thumbnail'	   => $args['thumbnail'],
				'preview'		 => $args['preview'],
				'demo_url'		=> isset( $template_data['demo_url'] ) ? $template_data['demo_url'] : '',
				'type'			=> $template_data['type'],
				'category'		=> isset( $template_data['category'] ) ? $template_data['category'] : array(),
				'tags'			=> isset( $template_data['tags'] ) ? $template_data['tags'] : array(),
			);
		}

		private function get_templates_dir() {
			return apply_filters(
				'xcare_get_templates_dir',
				self::$xcare_template_kits_templates_dir
			);
		}

		private function get_templates_url() {
			return apply_filters(
				'xcare_get_templates_url',
				self::$xcare_template_kits_templates_url
			);
		}

		function editor_templates() {
			$this->load_directory( 'xcare-lightbox' );
		}

		/**
		 * Replace elements IDs.
		 *
		 * For any given Elementor content/data, replace the IDs with new randomly
		 * generated IDs.
		 *
		 * @since 1.0.0
		 * @access protected
		 *
		 * @param array $content Any type of Elementor data.
		 *
		 * @return mixed Iterated data.
		 */
		protected function replace_elements_ids( $content ) {
			return Plugin::$instance->db->iterate_data( $content, function( $element ) {
				$element['id'] = Utils::generate_random_string();

				return $element;
			} );
		}

		/**
		 * Process content for export/import.
		 *
		 * Process the content and all the inner elements, and prepare all the
		 * elements data for export/import.
		 *
		 * @since 1.5.0
		 * @access protected
		 *
		 * @param array  $content A set of elements.
		 * @param string $method  Accepts either `on_export` to export data or
		 *						`on_import` to import data.
		 *
		 * @return mixed Processed content data.
		 */
		protected function process_export_import_content( $content, $method ) {
			return Plugin::$instance->db->iterate_data(
				$content, function( $element_data ) use ( $method ) {
					$element = Plugin::$instance->elements_manager->create_element_instance( $element_data );

					// If the widget/element isn't exist, like a plugin that creates a widget but deactivated
					if ( ! $element ) {
						return null;
					}

					return $this->process_element_export_import_content( $element, $method );
				}
			);
		}

		/**
		 * Process single element content for export/import.
		 *
		 * Process any given element and prepare the element data for export/import.
		 *
		 * @since 1.5.0
		 * @access protected
		 *
		 * @param Controls_Stack $element
		 * @param string		 $method
		 *
		 * @return array Processed element data.
		 */
		protected function process_element_export_import_content( Controls_Stack $element, $method ) {
			$element_data = $element->get_data();

			if ( method_exists( $element, $method ) ) {
				// TODO: Use the internal element data without parameters.
				$element_data = $element->{$method}( $element_data );
			}

			foreach ( $element->get_controls() as $control ) {
				$control_class = Plugin::$instance->controls_manager->get_control( $control['type'] );

				// If the control isn't exist, like a plugin that creates the control but deactivated.
				if ( ! $control_class ) {
					return $element_data;
				}

				if ( method_exists( $control_class, $method ) ) {
					$element_data['settings'][ $control['name'] ] = $control_class->{$method}( $element->get_settings( $control['name'] ), $control );
				}

				// On Export, check if the control has an argument 'export' => false.
				if ( 'on_export' === $method && isset( $control['export'] ) && false === $control['export'] ) {
					unset( $element_data['settings'][ $control['name'] ] );
				}
			}

			return $element_data;
		}

	}
}

new Xcare_Template_Kits(
	array(
		'xcare_template_kits_title'		 => esc_html__( 'Xcare Template Kits', 'xcare' ),
		'xcare_template_kits_templates_dir' => get_template_directory() . '/includes/xcare-template-kits/templates',
		'xcare_template_kits_templates_url' => get_template_directory_uri() . '/includes/xcare-template-kits/templates'
	)
);