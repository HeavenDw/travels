<?php

if (!defined('ABSPATH')) {
	exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Настройки сайта' ) )
    ->add_tab( 'Общие настройки',array(
        Field::make( 'image', 'site_logo', 'Логотип' ),
        Field::make( 'text', 'site_footer_text', 'Текст в подвале' ),
    ) )

    ->add_tab( 'Контакты',array(
        Field::make( 'text', 'site_phone', 'Телефон' ),
        Field::make( 'text', 'site_phone_digits', 'Телефон в формате +79999999999' ),
        Field::make( 'text', 'site_address', 'Адрес' ),
        Field::make( 'text', 'site_map_coordinates', 'Координаты карты' ),
        Field::make( 'text', 'site_vk_url', 'Ссылка на вк' ),
        Field::make( 'text', 'site_facebook_url', 'Ссылка на фб' ),
        Field::make( 'text', 'site_instagram_url', 'Ссылка на инст' ),
    ) );