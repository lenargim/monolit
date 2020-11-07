<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);


/* Excerpt */
//function change_excerpt_more($more) {
//    return ' >>';
//}
//add_filter('excerpt_more', 'change_excerpt_more', 99 );


//add_filter( 'excerpt_length', function(){
//    return 10;
//} );

function custom_read_more($read_more_type) {
    if ($read_more_type == 'dots') {
        return '...';
    } else {
        return '>>';
    }
}

function excerpt($limit, $read_more_type) {
    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more($read_more_type));
}

/* Регистрация типа записи Команда */

add_action('init', 'my_custom_team');
function my_custom_team(){
    register_post_type('team', array(
        'labels'             => array(
            'name'               => 'Команда', // Основное название типа записи
            'singular_name'      => 'Член команды', // отдельное название записи типа Book
            'add_new'            => 'Добавить нового',
            'add_new_item'       => 'Добавить нового члена команды',
            'edit_item'          => 'Редактировать члена команды',
            'new_item'           => 'Новый член команды',
            'view_item'          => 'Посмотреть члена команды',
            'search_items'       => 'Найти члена команды',
            'not_found'          =>  'Члена команды не наайдено',
            'not_found_in_trash' => 'В корзине не найдено члена команды',
            'parent_item_colon'  => '',
            'menu_name'          => 'Команда',
            'menu_icon'          => 'dashicons-admin-users',

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'show_in_rest' => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail')
    ) );

    register_post_type('practices', array(
        'labels'             => array(
            'name'               => 'Практики', // Основное название типа записи
            'singular_name'      => 'Практика', // отдельное название записи типа Book
            'add_new'            => 'Добавить новую',
            'add_new_item'       => 'Добавить новую практику',
            'edit_item'          => 'Редактировать практику',
            'new_item'           => 'Новая практика',
            'view_item'          => 'Посмотреть практику',
            'search_items'       => 'Найти практику',
            'not_found'          =>  'Практика не наайдена',
            'not_found_in_trash' => 'В корзине не найдено практики',
            'parent_item_colon'  => '',
            'menu_name'          => 'Практики',
            'menu_icon'          => 'dashicons-admin-users',

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'show_in_rest' => true,
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail'),
        'taxonomies'          => array( 'practices' ),

    ) );
}

add_action( 'init', 'create_services_taxonomies' );

function create_services_taxonomies(){

    register_taxonomy('services', 'practices',array(
        'hierarchical'  => true,
        'labels'        => array(
            'name'                        => _x( 'Услуги', 'taxonomy general name' ),
            'singular_name'               => _x( 'Услуга', 'taxonomy singular name' ),
            'search_items'                =>  __( 'Поиск услуг' ),
            'popular_items'               => __( 'Популярные услуги' ),
            'all_items'                   => __( 'Все услуги' ),
            'parent_item'                 => null,
            'parent_item_colon'           => null,
            'edit_item'                   => __( 'Редактировать услугу' ),
            'update_item'                 => __( 'Изменить услугу' ),
            'add_new_item'                => __( 'Добавить новую услугу' ),
            'new_item_name'               => __( 'New service Name' ),
            'separate_items_with_commas'  => __( 'Separate writers with commas' ),
            'add_or_remove_items'         => __( 'Add or remove writers' ),
            'choose_from_most_used'       => __( 'Choose from the most used writers' ),
            'menu_name'                   => __( 'Услуги' ),
        ),
        'show_ui'       => true,
        'query_var'     => true,
        //'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
    ));
}

function true_register_wp_sidebars() {

    /* В боковой колонке - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'sidebar_practices', // уникальный id
            'name' => 'Боковая колонка Практики', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар на страницу Практики.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );
}

add_action( 'widgets_init', 'true_register_wp_sidebars' );





/* Подсчет количества просмотров */

function setPostViews($postID) {
    $count_key = 'views';
    $count = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function getPostViews($postID){
    $count_key = 'views';
    $count = get_post_meta( $postID, $count_key, true );
    if($count==''){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID,	$count_key,	'0' );
        return	"0";
    }
    return	$count;
}

// пересчет попуярности один раз в сутки.
add_action('wp', 'my_activation');
function my_activation() {
    if( ! wp_next_scheduled( 'my_daily_event' ) ) {
        wp_schedule_event( time(), 'daily', 'my_daily_event');
    }
}

// добавляем функцию к указанному хуку
function do_this_daily() {
    global $wpdb;
    $postids = $wpdb->get_results("SELECT ID FROM $wpdb->posts WHERE post_status='publish' AND post_type='post' ORDER BY ID ASC");

    foreach( $postids as $postid ){
        $postid = $postid->ID; // ID записи

        // считаем количество просмотров
        $views = (int)get_post_meta( $postid, 'views', true );
        // считаем дни существования поста
        //$dtNow = get_the_time('U'); $dtTime = current_time('U'); $diff = $dtTime - $dtNow;
        $dtNow = get_post_time('U', true, $postid); $dtTime = current_time('U'); $diff = $dtTime - $dtNow;

        // считаем комментарии и сумму просмотров с комментариями
        $comments = get_comments_number( $postid );
        $summa = $views + $comments;
        // считаем индекс популярности
        if ( $days = '0' ){
            $pop_index = $summa / 1;
        } else {
            $days = (int)$diff/86400;
            $pop_index = $summa / $days;
        }
        $pop = round($pop_index, 2);
        // записываем индекс популярности в произвольное поле поста
        update_post_meta( $postid, 'popularity', $pop );
    }
}
add_action('my_daily_event', 'do_this_daily', 10, 2);

