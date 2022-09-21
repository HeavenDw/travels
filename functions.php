<?php
remove_action('wp_head', 'wp_generator'); // Убирает вывод используемого движка и его версии
remove_action('wp_head', 'rel_canonical'); // Убирает канонические линки
remove_action('wp_head', 'wp_shortlink_wp_head'); // Убирает короткую ссылку к текущей странице
remove_action('wp_head', 'wlwmanifest_link'); // Используется блог-клиентами, а вернее лишь одним из них - Windows Live Writer. Не используете WLW - удаляйте.
remove_action('wp_head', 'rsd_link'); // Используется различными блог-клиентами или веб-сервисами для публикации/изменения записей в блоге.
remove_action('wp_head', 'pagenavi_css'); // Убирает вывод лишнего css изи плагина WP-PageNavi
remove_action('wp_head', 'index_rel_link'); // Убирает ссылку на главную страницу
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Убирает ссылку на предыдущую запись
remove_action('wp_head', 'start_post_rel_link', 10, 0);  // Убирает ссылку на первую запись
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Убирает связь с родительской записью
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Убирает ссылку на следующую запись
remove_action('wp_head', 'feed_links_extra', 3); // Запрещаем вывод RSS фида для записей, тегов, рубрик и т.д. Таким образом, мы запрещаем создавать такие фиды, но тем не менее, они будут доступны, если добавить /feed в конец урла.
remove_action('wp_head', 'feed_links', 2); // Формально если запретить данное действие, то в блоге не должны выводиться ссылки на основную ленту RSS и на RSS ленту комментариев. А на практике это работать не будет, так как функция wp_head не выводит эти самые ссылки на RSS ленты записей и комментариев, их вывод должен осуществляться вручную в файле header.php
//полное отключение Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

add_action( 'wp_enqueue_scripts', 'site_scripts');
function site_scripts() {
	$version= '0.0.0.0';
	wp_dequeue_style( 'wp-block-library' );

	wp_enqueue_style('main-style', get_stylesheet_uri(), [], $version);
  	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap');

	wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');
	wp_register_script( 'jquery-core', 'https://code.jquery.com/jquery-3.5.1.min.js', [], null );
	wp_register_script( 'jquery', false, array('jquery-core'), null );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', [], $version, true);

	wp_localize_script( 'main-js', 'WPJS', [
		'siteUrl' => get_template_directory_uri(),
	] );
};

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'includes/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Контент сайта' ) )
    ->add_tab( 'Маршруты',array(
        Field::make( 'complex', 'region', __( 'Области' ) )
        ->setup_labels( array(
            'plural_name' => 'Области',
            'singular_name' => 'Область'
        ) )
        ->set_layout( 'tabbed-horizontal' )
        ->add_fields( [
            Field::make( 'text', 'region_title', __( 'Название Области' ) ),
            Field::make( 'complex', 'travel', __( 'Маршруты' ) )
            ->setup_labels( array(
                'plural_name' => 'Маршруты',
                'singular_name' => 'Маршрут'
            ) )
            ->set_layout( 'tabbed-horizontal' )
            ->add_fields( array(
                Field::make( 'text', 'travel_date', __( 'Дата / Количество дней' ) )
                    ->set_attribute( 'placeholder', '30 мая - 6 июня / 8 дней' ),
                Field::make( 'text', 'travel_title', __( 'Название маршрута' ) ),
                Field::make( 'text', 'travel_price', __( 'Цена только в цифрах' ) )
                    ->set_attribute( 'placeholder', '10 000' ),
                Field::make( 'textarea', 'travel_text', __( 'Описание на основной карточке' ) ),
                Field::make( 'textarea', 'travel_italic', __( 'Курсивный текст на основной карточке' ) ),
                Field::make( 'rich_text', 'travel_description', __( 'Полное описание (обернуть в маркированный список)' ) ),
                Field::make( 'rich_text', 'travel_fullprice', __( 'Полная стоимость (обернуть в маркированный список)' ) ),
                Field::make( 'media_gallery', 'travel_gallery', __( 'Фотографии маршрута' ) )
                    ->set_type( array( 'image' ) )
                    ->set_duplicates_allowed( false )
            ) )
        ]),
        
    ) )

    ->add_tab( 'Контакты',array(
        Field::make( 'text', 'site_phone', 'Телефон в формате +7 (999) 999-99-99' ),
        Field::make( 'text', 'site_phone_digits', 'Телефон в формате +79999999999' ),
        Field::make( 'text', 'site_vk_url', 'Ссылка на vkontakte (https://vk.com/)' ),
        Field::make( 'text', 'site_instagram_url', 'Ссылка на instagram (https://www.instagram.com/)' ),
        Field::make( 'text', 'site_mail', 'Адрес электронной почты' ),
    ) )

    ->add_tab( 'Шапка',array(
        Field::make( 'image', 'header_fav', 'Favicon' ),
        Field::make( 'textarea', 'header_metrika', 'Код Яндекс.Метрика' ),
    ) )
    
    ->add_tab( 'Подвал',array(
        Field::make( 'image', 'footer_image', 'Партнеры' ),
        Field::make( 'text', 'footer_text', 'Текст в конце' ),
    ) );

    Container::make( 'post_meta', __( 'Дополнительные поля' ) )
    ->show_on_post_type('travel')
    ->add_tab( 'Информация о маршруте',array(
        Field::make( 'text', 'travel_date', __( 'Дата / Количество дней' ) )
            ->set_attribute( 'placeholder', '30 мая - 6 июня / 8 дней' ),
        Field::make( 'text', 'travel_title', __( 'Название маршрута' ) ),
        Field::make( 'text', 'travel_price', __( 'Цена только в цифрах' ) )
            ->set_attribute( 'placeholder', '10 000' ),
        Field::make( 'textarea', 'travel_text', __( 'Описание на основной карточке' ) ),
        Field::make( 'textarea', 'travel_italic', __( 'Курсивный текст на основной карточке' ) ),
        Field::make( 'rich_text', 'travel_description', __( 'Полное описание (обернуть в маркированный список)' ) ),
        Field::make( 'rich_text', 'travel_fullprice', __( 'Полная стоимость (обернуть в маркированный список)' ) ),
        Field::make( 'media_gallery', 'travel_gallery', __( 'Фотографии маршрута' ) )
            ->set_type( array( 'image' ) )
            ->set_duplicates_allowed( false )
    ) );

}

add_action('init', 'create_global_variable');
function create_global_variable() {
	global $travel;
	$travel = [
		'phone' => carbon_get_theme_option( 'site_phone' ),
		'phone_digits' => carbon_get_theme_option( 'site_phone_digits' ),
		'vk_url' => carbon_get_theme_option( 'site_vk_url' ),
		'instagram_url' => carbon_get_theme_option( 'site_instagram_url' ),
		'mail' => carbon_get_theme_option( 'site_mail' ),
	];
}

//кастом опции для селекта формы
function select_from_travels_title ( $tag, $unused ) {  

    if ( $tag['name'] != 'travels-list' )  
        return $tag;  

    

    $travel_options = carbon_get_theme_option('region');
    foreach ( $travel_options as $option ){
        $travels = $option['travel'];
        foreach ( $travels as $travel ){

            $tag['raw_values'][] = $travel['travel_title'];  
            $tag['values'][] = $travel['travel_title'];  
        };
    };
    return $tag;  
}  
add_filter( 'wpcf7_form_tag', 'select_from_travels_title', 10, 2);  

// add_action( 'init', 'register_post_types' );
// function register_post_types(){
// 	register_post_type( 'travel', [
// 		'labels' => [
// 			'name'               => 'Маршруты', // основное название для типа записи
// 			'singular_name'      => 'Маршрут', // название для одной записи этого типа
// 			'add_new'            => 'Добавить маршрут', // для добавления новой записи
// 			'add_new_item'       => 'Добавление маршрута', // заголовка у вновь создаваемой записи в админ-панели.
// 			'edit_item'          => 'Редактирование маршрута', // для редактирования типа записи
// 			'new_item'           => 'Новый маршрут', // текст новой записи
// 			'view_item'          => 'Смотреть маршрут', // для просмотра записи этого типа.
// 			'search_items'       => 'Искать машрут', // для поиска по этим типам записи
// 			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
// 			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
// 			'menu_name'          => 'Маршруты', // название меню
// 		],
// 		'public'              => true,
// 		'menu_position'       => 5,
// 		'menu_icon'           => 'dashicons-cart',
// 		//'capability_type'   => 'post',
// 		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
// 		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
// 		'hierarchical'        => false,
// 		'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
// 		'has_archive'         => false,
// 	] );

// 	register_taxonomy( 'regions', 'travel', [
// 		'labels'                => [
// 			'name'              => 'Области',
// 			'singular_name'     => 'Область',
// 			'search_items'      => 'Найти Область',
// 			'all_items'         => 'Все Области',
// 			'view_item '        => 'Посмотреть область',
// 			'edit_item'         => 'Изменить Область',
// 			'update_item'       => 'Обновить Область',
// 			'add_new_item'      => 'Добавить новую область',
// 			'new_item_name'     => 'Новое название области',
// 			'menu_name'         => 'Области',
// 		],
//         'supports'              => ['title'],
// 		'hierarchical'          => false,
// 	] );
// }