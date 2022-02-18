<?php
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

require_once get_template_directory() . '/includes/init.php';
/**
 * Enqueue scripts and styles.
 */
function blkcanvas_scripts() {
	wp_enqueue_style( 'blkcanvas-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'blkcanvas-style', 'rtl', 'replace' );

	wp_enqueue_script( 'blkcanvas-navigation', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'blkcanvas_scripts' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blkcanvas_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on blkcanvas, use a find and replace
		* to change 'blkcanvas' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'blkcanvas', get_template_directory() . '/languages' );

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

	add_image_size('thumbnail', 336, 0, true);
	add_image_size('medium', 750, 422, true);
	add_image_size('medium_large', 750, 0, true);
	add_image_size('large', 1024, 0, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Main Menu', 'blkcanvas' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'blkcanvas' ),
			'footer-submenu' => esc_html__( 'Footer Sub Menu', 'blkcanvas' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'blkcanvas_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

add_action( 'after_setup_theme', 'blkcanvas_theme_setup' );

function tpd_override_media_settings() {

	update_option( 'thumbnail_size_w' , 336 );
	update_option( 'thumbnail_size_h' , 0 );
	update_option( 'medium_size_w' , 750 );
	update_option( 'medium_size_h' , 422 );
	update_option( 'large_size_w' , 1024 );
	update_option( 'large_size_h' , 0 );

}

add_action( 'after_switch_theme', 'tpd_override_media_settings' ); 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blkcanvas_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'blkcanvas' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'blkcanvas' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'blkcanvas_widgets_init' );

if ( ! function_exists( 'blkcanvas_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function blkcanvas_post_thumbnail( $class = '' ) {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$thumbnail_class = 'aspect-ratio';

		if ($class) {
			$thumbnail_class .= ' ' . $class;
		}

		if ( is_singular() ) :
			
			the_post_thumbnail( 'medium' ); 
			
			the_post_thumbnail_caption();
			
		?>

		<?php else : ?>

			<a class="post-thumbnail <?php echo $thumbnail_class; ?>" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>
			
			<?php
		endif; // End is_singular().
	}
endif;


function blkcanvas_has_post_thumbnail__false( $has_thumbnail )
{
	return false;
}
if ( ! function_exists( 'blkcanvas_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function blkcanvas_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">Updated: %4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'blkcanvas' ),
			$time_string
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'blkcanvas_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blkcanvas_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'blkcanvas' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'blkcanvas_content' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blkcanvas_content( $read_more = false ) {
		?>
		<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blkcanvas' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blkcanvas' ),
				'after'  => '</div>',
			)
		);
		?>
		</div><!-- .entry-content -->
	<?php
	}
endif;

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function blkcanvas_archive_excerpt_length( $length ) {
    return 20;
}

function blkcanvas_filter_archive_content( $content )
{
	global $post;

	if ( is_singular() ) return $content;
	
	setup_postdata( $post );

	add_filter( 'excerpt_length', 'blkcanvas_archive_excerpt_length', 999 );

	remove_filter('the_content', 'blkcanvas_filter_archive_content', 10, 1);
	
	$content = get_the_excerpt();
	
	add_filter('the_content', 'blkcanvas_filter_archive_content', 10, 1);
	
	return $content;
}

add_filter('the_content', 'blkcanvas_filter_archive_content', 10, 1);

function blkcanvas_excerpt()
{
	# code...
}
/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function blkcanvas_excerpt_more( $excerpt ) {
	
    if ( ! is_single() ) {
        $excerpt = $excerpt . ' <a class="read-more" href="'.get_permalink( get_the_ID() ).'">Read More</a>';
    }
	
    return $excerpt;
}

function blkcanvas_remove_archive_title_prefix($prefix)
{
	return;
}
add_filter( 'get_the_archive_title_prefix', 'blkcanvas_remove_archive_title_prefix', 10, 1 );
function blkcanvas_get_archive_header()
{
	if (!is_archive()) return;
?>
<header class="page-header">
	<?php
	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="archive-description">', '</div>' );
	?>
</header><!-- .page-header -->
<?php
}

add_action('wp_body_open', 'blkcanvas_get_archive_header');

function blkcanvas_logo()
{
	$has_custom_logo = has_custom_logo();
	?>
	<div class="site-logo-container <?php echo $has_custom_logo ? 'has-custom-logo' : ''; ?>">

	<?php if ( $has_custom_logo ) : ?>
		<?php the_custom_logo(); ?>
	<?php else: ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
		$sandbox_description = get_bloginfo( 'description', 'display' );
		if ( $sandbox_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $sandbox_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
		<?php endif; 
	endif;?>
	</div>
	<?php
}

function blkcanvas_footer_menu()
{
	wp_nav_menu(
		array(
			'theme_location' => 'footer-menu',
			'menu_id'        => 'footer-menu',
			'container' => 'nav',
			'container_class' => 'navigation'
		)
	);
}

function blkcanvas_footer_submenu()
{
	wp_nav_menu(
		array(
			'theme_location' => 'footer-submenu',
			'menu_id'        => 'footer-submenu',
			'container' => 'nav',
			'container_class' => 'navigation'
		)
	);
}

/**
 * Google Fonts Async Snippet
 * @see https://csswizardry.com/2020/05/the-fastest-google-fonts/
 */
function blkcanvas_load_fonts()
{
	// - 1. Preemptively warm up the fonts’ origin.
	// -
	// - 2. Initiate a high-priority, asynchronous fetch for the CSS file. Works in
	// -    most modern browsers.
	// -
	// - 3. Initiate a low-priority, asynchronous fetch that gets applied to the page
	// -    only after it’s arrived. Works in all browsers with JavaScript enabled.
	// -
	// - 4. In the unlikely event that a visitor has intentionally disabled
	// -    JavaScript, fall back to the original method. The good news is that,
	// -    although this is a render-blocking request, it can still make use of the
	// -    preconnect which makes it marginally faster than the default.

	$link = 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&Heebo:wght@700;900&family=Inter:wght@700;900&family=Lexend:wght@400;500;600;700&Open+Sans:wght@300;400;700&display=swap';
	?>
	<!-- [1] -->
	<link rel="preconnect"
		href="https://fonts.gstatic.com"
		crossorigin />

	<!-- [2] -->
	<link rel="preload"
		as="style"
		href="<?php echo $link; ?>" />

	<!-- [3] -->
	<link rel="stylesheet"
		href="<?php echo $link; ?>"
		media="print" onload="this.media='all'" />

	<!-- [4] -->
	<noscript>
	<link rel="stylesheet"
			href="<?php echo $link; ?>" />
	</noscript>
	<?php
}
add_action( 'wp_head', 'blkcanvas_load_fonts' );

function blkcanvas_preloads()
{
	global $post;

	blkcanvas_head_scripts();
	
	if ( is_single() ) {
		$thumbnail_url = get_the_post_thumbnail_url();
		echo '<link rel="preload" as="image" href="' . $thumbnail_url . '" />';
	}
}
add_action( 'wp_head', 'blkcanvas_preloads' );


function blkcanvas_head_scripts()
{
	?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-C0JN2YMJGW"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-C0JN2YMJGW');
	</script>
	<?php
}