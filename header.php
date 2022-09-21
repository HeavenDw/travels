<!doctype html>
<html lang="ru">
<head>
	<title>Твои Путешествия</title>
	<meta charset="UTF-8">
    <?php echo carbon_get_theme_option('header_metrika'); ?>
	<!-- /enable css -->
    <?php $favicon_id = carbon_get_theme_option('header_fav');  ?>
	<link rel="shortcut icon" href="<?php echo wp_get_attachment_image_url($favicon_id, 'full'); ?>">
	<!-- enable responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- /enable responsive -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); 
global $travel;
?>

	<!-- wrapper -->
	<div class="wrapper">

		<!-- header -->
		<header class="header">
			<nav class="header__menu">
				<ul class="header__list">
                    <li><a href="" data-goto=".project" class="header__link _icon-project"><span>О проекте</span></a></li>
					<li><a href="" data-goto=".routes" class="header__link _icon-route"><span>Маршруты</span></a></li>
                    <li><a href="" data-goto=".about" class="header__link _icon-about-us"><span>О нас</span></a></li>
					<li><a href="" data-goto=".form" class="header__link _icon-info"><span>Оставить заявку</span></a></li>
                    <li><a href="" data-goto=".insta" class="header__link _icon-photo"><span>Фотографии</span></a></li>
					<li><a href="<?php echo $travel['instagram_url'];?>" target="_blank" class="header__link _icon-instagram"><span>Инстаграм</span></a></li>
					<li><a href="<?php echo $travel['vk_url'];?>" target="_blank" class="header__link _icon-vk"><span>Вконтакте</span></a></li>
					<li><a href="tel:<?php echo $travel['phone_digits'];?>" class="header__link _icon-phone"><span><?php echo $travel['phone']; ?></span></a></li>
				</ul>
			</nav>
			<div class="header__mobile">
				<div class="header__burger menu__icon">
					<span></span>
				</div>
			</div>
		</header>
		<!-- /header -->
