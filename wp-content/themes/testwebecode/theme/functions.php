<?php
/**
 * test_webecode functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test_webecode
 */

if ( ! defined( 'TESTWEBECODE_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'TESTWEBECODE_VERSION', '0.1.0' );
}

if ( ! defined( 'TESTWEBECODE_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `testwebecode_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'TESTWEBECODE_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'testwebecode_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function testwebecode_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on test_webecode, use a find and replace
		 * to change 'testwebecode' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'testwebecode', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'testwebecode' ),
				'menu-2' => __( 'Footer Menu', 'testwebecode' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'testwebecode_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function testwebecode_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'testwebecode' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'testwebecode' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'testwebecode_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function testwebecode_scripts() {
	wp_enqueue_style( 'testwebecode-style', get_stylesheet_uri(), array(), TESTWEBECODE_VERSION );
	wp_enqueue_script( 'testwebecode-script', get_template_directory_uri() . '/js/script.min.js', array(), TESTWEBECODE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'testwebecode_scripts' );

/**
 * Enqueue the block editor script.
 */
function testwebecode_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_script(
			'testwebecode-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			TESTWEBECODE_VERSION,
			true
		);
		wp_add_inline_script( 'testwebecode-editor', "tailwindTypographyClasses = '" . esc_attr( TESTWEBECODE_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'testwebecode_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function testwebecode_tinymce_add_class( $settings ) {
	$settings['body_class'] = TESTWEBECODE_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'testwebecode_tinymce_add_class' );



if ( function_exists('acf_register_block_type') ) {

    function my_acf_init_block_types() {

		// Block 1
		// Titre: champ "texte", nom "title"
		// Zone de texte: champ "Éditeur WYSIWYG", nom "description"
		// Boutton: champ "lien", nom "button" (tableau)
		// Image: champ "image", nom "image"
		// Couleur de fond: champ "True/false", nom "background_color"
		// Option inverser l'image et le texte: champ "True/False", nom "reverse_text_image"

		// Bloc avec fond de couleur (primary) qui prend toute la largeur + titre, description, bouton à gauche et image à droite

		acf_register_block_type(array(
            'name'              => 'block_1',
            'title'             => __('Block 1'),
            'description'       => __("Bloc avec titre, description sur la gauche et image sur la droite"),
            'render_template'   => 'block/block-1/block_1.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

		// Block 2
		// Titre: champ "texte", nom "title"
		// Description: champ "Éditeur WYSIWYG", nom "description"
		// Lien: champ "lien", nom "link"
		// Répéteur de cards (6 premières max): champ "répéteur", nom "repeater_cards"
		// Sous-champs:
			// - Titre: champ "Éditeur WYSIWYG", nom "card_title"
			// - Icone: champ "image", nom "card_image"
		
		// Bloc avec grid 3x2 de cards avec icone et description

		acf_register_block_type(array(
            'name'              => 'block_2',
            'title'             => __('Block 2'),
            'description'       => __("Bloc avec des cards de présentation"),
            'render_template'   => 'block/block-2/block_2.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

		// Block 3
		// Titre: champ "texte", nom "title"
		// Description: champ "Éditeur WYSIWYG", nom "description"
		// Lien: champ "lien", nom "link"
		// Répéteur pour services (4 max): champ "répéteur", nom "repeater_services"
		// Sous-champs:
			// - Icone: champ "image", nom "icon"
			// - Titre: champ "texte", nom "title"
			// - Description: champ "zone de texte", nom "description"
		
		// Bloc avec des présentations services en 4 colonnes (icones, titre, description)

		acf_register_block_type(array(
            'name'              => 'block_3',
            'title'             => __('Block 3'),
            'description'       => __("Bloc avec des présentation de services"),
            'render_template'   => 'block/block-3/block_3.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

		// Block 4
		// Titre: champ "texte", nom "title"
		// Texte: champ "zone de texte", nom "text"
		// Lien: champ "lien", nom "button"
		// // Répéteur d'options (5 max): champ "répéteur", nom "options_repeater"
		// Sous-champs:
			// - Icone: champ "image", nom "icon"
			// - Titre: champ "texte", nom "title"
			// - Description: champ "Éditeur WYSIWYG", nom "description"

		// Bloc accordéon avec menus cliquables déroulants
		
		acf_register_block_type(array(
            'name'              => 'block_4',
            'title'             => __('Block 4'),
            'description'       => __("Bloc avec des menus cliquables déroulants"),
            'render_template'   => 'block/block-4/block_4.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

		// Block 5
		// Titre: champ "Éditeur WYSIWYG", nom "title"
		// Description: champ "Éditeur WYSIWYG", nom "description"
		// Lien: champ "lien", nom "button"
		// Répéteur de cards: champ "répéteur", nom "cards_repeater"
		// Sous-champs:
			// - Titre: champ "texte", nom "title"
			// - Sous-titre: champ "texte", nom "subtitle"
			// - Description: champ "Éditeur WYSIWYG", nom "description"
		// Option couleur de fond dernière card: champ "True/False", nom "last_card_option"

		// Bloc avec grandes cards qui se superposent au scroll (animation)
		
		acf_register_block_type(array(
            'name'              => 'block_5',
            'title'             => __('Block 5'),
            'description'       => __("Bloc avec des grandes cards de présentation et effet parallax au scroll"),
            'render_template'   => 'block/block-5/block_5.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

		// Block 6
		// Détail des champs dans le fichier block-6.php
		// Bloc flexible avec les 4 cards (et le compteur d'arbre)
		
		acf_register_block_type(array(
            'name'              => 'block_6',
            'title'             => __('Block 6'),
            'description'       => __("Bloc flexible (4 blocs)"),
            'render_template'   => 'block/block-6/block_6.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

		// Block 7
		// Détail des champs dans le fichier block-7.php
		// Bloc flexible qui ressemble au block 6 avec 3 cards 
		
		acf_register_block_type(array(
            'name'              => 'block_7',
            'title'             => __('Block 7'),
            'description'       => __("Bloc flexible (3 blocs)"),
            'render_template'   => 'block/block-7/block_7.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

		// Block 8
		// Détail des champs dans le fichier block-8.php
		// Bloc flexible avec plusieurs cards qui comparent site web normal et site web éco-responsable

		acf_register_block_type(array(
            'name'              => 'block_8',
            'title'             => __('Block 8'),
            'description'       => __("Bloc avec plusieurs cards dont les infos changent avec animation"),
            'render_template'   => 'block/block-8/block_8.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

		// Block 9
		// Détail des champs dans le fichier block-9.php
		// Bloc avec titre description bouton à gauche et image à droite

		acf_register_block_type(array(
            'name'              => 'block_9',
            'title'             => __('Block 9'),
            'description'       => __("Bloc avec titre description bouton à gauche et image à droite"),
            'render_template'   => 'block/block-9/block_9.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('test', 'custom', 'acf', 'block', 'accueil'),
            'supports'          => array(
                'align' => true,
                'anchor' => true,
                'customClassName' => true,
            ),
        ));

    }
    add_action('acf/init', 'my_acf_init_block_types');

}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
